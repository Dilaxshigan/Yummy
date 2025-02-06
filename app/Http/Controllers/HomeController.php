<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function contact_submit(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'email'=>'required|email',
            'subject'=>'required|min:3',
            'message'=>'required|min:3'
        ]);

        $data = new ContactInfo;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('contact_success','Your message has been sent. Thank you!');

    }
}
