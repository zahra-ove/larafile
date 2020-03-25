<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        #validate inputs
        $request->validate([
            'fname'   => 'nullable|string',
            'lname'   => 'nullable|string',
            'phone'   => 'nullable|numeric',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        #save inputs to contacts table
        $newMessage = new Contact();
        $newMessage->first_name   =  $request->input('fname');
        $newMessage->last_name    =  $request->input('lname');
        $newMessage->phone        =  $request->input('phone');
        $newMessage->email        =  $request->input('email');
        $newMessage->message      =  $request->input('message');
        $newMessage->save();


        return redirect('/contact')->with('status', '.پیام شما با موفقیت ثبت شد. از حسن توجه شما متشکریم');

    }
}
