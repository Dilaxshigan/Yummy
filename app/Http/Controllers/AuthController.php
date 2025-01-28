<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use App\Mail\ForgetPasswordMail;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function reg_submit(Request $request)
    {
        $request->validate([
            'first_name'=>'required|min:3|max:100',
            'last_name'=>'required|min:3|max:100',
            'email'=>'required|email|unique:users',
            'phone' => 'required|min:10',
            'address' => 'required|min:5',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password',
            'terms'=>'required',
            'grecaptcha'=>'required'
        ]);
                // If we validate the form using google recaptcha
                $grecaptcha=$request->grecaptcha;
                $client = new Client();
                $response = $client->post(
                    'https://www.google.com/recaptcha/api/siteverify',
                    ['form_params'=>
                          [
                            'secret'=>env('GOOGLE_CAPTCHA_SECRET_KEY'),
                            'response'=>$grecaptcha
                          ]
                    ]
                );
        
                $body = json_decode((string)$response->getBody());
        
                if($body->success==true){
                    $data = new User;
        
                    $data->first_name = $request->first_name;
                    $data->last_name = $request->last_name;
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->address = $request->address;
                    $data->password = bcrypt($request->password);
                    $data->email_verification_code = Str::random(40);
                    $data->save();
        
                    Mail::to($request->email)->send(new EmailVerificationMail($data));
                
                    return redirect()->back()->with('success', 'To verify customer successfully!, Please check your mail..');
        
                }else{
                    return redirect()->back()->with('error','Inavalid recaptcha');
                }
    }
    public function verify_mail($verification_code)
    {
        $data=User::where('email_verification_code', $verification_code)->first();
        if(!$data){
            return redirect()->route('register')->with('error', 'Invalid URL');
        }else{
           if($data->email_verified_at){
            return redirect()->route('register')->with('error', 'Email already verified');
           }else{
            $data->update([
                'email_verified_at'=>\Carbon\Carbon::now()
            ]);
            return redirect()->route('login')->with('success', 'Email successfully verified');
           } 
        }
    }
    public function login()
    {
        return view('auth.login');
    }
    public function log_submit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:100',
            'grecaptcha'=>'required'
        ]);
                // If we validate the form using google recaptcha
                $grecaptcha=$request->grecaptcha;
                $client = new Client();
                $response = $client->post(
                    'https://www.google.com/recaptcha/api/siteverify',
                    ['form_params'=>
                          [
                            'secret'=>env('GOOGLE_CAPTCHA_SECRET_KEY'),
                            'response'=>$grecaptcha
                          ]
                    ]
                );
        
                $body = json_decode((string)$response->getBody());
        
                if($body->success==true){
                    $data=User::where('email',$request->email)->first();
                    if(!$data){
                        return redirect()->back()->with('error','Email is not registered');
                    }else{
                        if(!$data->email_verified_at){
                            return redirect()->back()->with('error','Email is not verified');
                        }else{
                            if(!$data->is_active){
                                return redirect()->back()->with('error','Customer is not active, contact admin');
                            }else{
                                $remember_me=($request->remember_me)?true:false;
                                if(auth()->attempt($request->only('email', 'password'), $remember_me)){
                                    return redirect()->route('home')->with('success', 'User successfully login');
                                }else{
                                    return redirect()->back()->with('error','Inavalid credentials');
                                }
                            }
                        }
                    }
        
                }else{
                    return redirect()->back()->with('error','Inavalid recaptcha');
                }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('success','Logout successfull..');
    }
    public function forget_password()
    {
        return view('auth.forget_password');
    }
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('error', 'User not found..');
        }else{
            $reset_code = Str::random(200);
            $data = new PasswordReset;

            $data->user_id = $user->id;
            $data->reset_code = $reset_code;

            $data->save();

            Mail::to($user->email)->send(new ForgetPasswordMail($user->first_name,$reset_code));

            return redirect()->back()->with('success', 'We have sent you a password reset link. Please check your email...');
        }
    }
    public function reset_password($reset_code)
    {
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();

        if(!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at){
            return redirect()->route('forget_password')->with('error', 'Invalid password reset link or link expired...');
        }else{
            return view('auth.reset_password', compact('reset_code'));
        }
    }
    public function reset_password_submit($reset_code, Request $request)
    {
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();

        if(!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at){
            return redirect()->route('forget_password')->with('error', 'Invalid password reset link or link expired...');
        }else{
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:6|max:100',
                'confirm_password'=>'required|same:password'
            ]);
            $user=User::find($password_reset_data->user_id);

            if($user->email!=$request->email){
                return redirect()->back()->with('error', 'Enter the correct mail...');
            }else{
                $password_reset_data->delete();
                $user->update([
                    'password'=>bcrypt($request->password)
                ]);

                return redirect()->route('login')->with('success', 'Password successfully reset...');
            }
        }

    }
}
