<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Partern;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $pages = Page::where('status',1)->first();
        $blogs = Blog::where('status',1)->orderBy('created_at','DESC')->take(3)->get();
        $parterns = Partern::where('status',1)->orderBy('created_at','DESC')->take(4)->get();
        $services = Service::where('status',1)->orderBy('created_at','DESC')->get();
        $banners = Banner::where('status',1)->orderBy('created_at','DESC')->get();

        return view('home', compact('services','blogs','pages','banners','parterns'));
    }
}
