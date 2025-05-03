<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function sendEmail(Request $request){

        $rule = [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'subjet'        => 'required',
            'message'       => 'required',
        ];

        $request->validate($rule);

        $mailData = [
            'subject'   => 'Vous avez reçu un email de contact',
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'subjet'        => $request->subjet,
            'message'       => $request->message,
        ];

        Mail::to('dev.grafikomsen@gmail.com')->send(new ContactEmail($mailData));
        session()->flash('success','Merci de nous avoir contactés, nous vous contacterons bientôt.');
        return redirect()->route('contact');
    }

    public function contact(){

        Session::put('page', 'contact');
        return view('contact');
    }

}
