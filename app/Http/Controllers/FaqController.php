<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){

        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('faq', compact('faqs'));
    }
}
