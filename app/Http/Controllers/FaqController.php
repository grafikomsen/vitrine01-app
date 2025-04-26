<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function index(){

        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();

        Session::put('page', 'faq');
        return view('faq', compact('faqs'));
    }
}
