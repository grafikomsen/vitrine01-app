<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function sendEmail(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'subjet'        => 'required',
            'message'       => 'required',
        ]);

        if ($validator->passes()) {
            # code...
        } else {
            # code...
            return redirect()->route('contact')->withErrors($validator);
        }

    }

}
