<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookTable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit_profile()
    {
        $user = auth()->user(); // Fetch the currently authenticated user
        $data['user'] = $user; // Assign the user object to the data array
        return view('profile.edit_profile', $data); // Pass the data to the view
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'first_name'=>'required|min:3|max:100',
            'last_name'=>'required|min:3|max:100',
            'phone' => 'required|min:10',
            'address' => 'required|min:5',
        ]);
        $user = auth()->user();

        $user->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        return redirect()->route('edit_profile')->with('success', 'Customer profile update successfully...');

    }
    public function edit_password()
    {
        return view('profile.edit_password');

    }
    public function update_password(Request $request)
    {
        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password'
        ]);
        $current_user = auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password successfully updated..');
        }else{
            return redirect()->back()->with('error', 'Old password does not matched..');
        }

    }
    public function booking_submit(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'email'=>'required|email',
            'phone' => 'required|min:10',
            'date'=>'required',
            'time'=>'required',
            'people'=>'required'
        ]);

        $data = new BookTable;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->people = $request->people;

        $data->save();

        return redirect()->back()->with('booking_success','Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');

    }
}
