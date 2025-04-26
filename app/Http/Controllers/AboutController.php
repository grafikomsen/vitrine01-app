<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index(){

        $pages = Page::where('status',1)->first();
        $teams = Team::where('status',1)->orderBy('created_at','DESC')->get();

        Session::put('page', 'about');
        return view('about', compact('pages','teams'));
    }
}
