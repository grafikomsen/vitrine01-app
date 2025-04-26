<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(){

        $blogs = Blog::where('status',1)->orderBy('created_at','DESC')->get();
        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();

        Session::put('page', 'blog');
        return view('blog', compact('blogs','faqs'));
    }

    public function detail($blogId){

        $blog = Blog::where('id',$blogId)->first();
        if (empty($blog)) {
            # code...
            return redirect('/');
        }
        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('blog-detail', compact('blog','faqs'));
    }
}
