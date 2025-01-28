<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $pages = Page::where('status',1)->first();
        $teams = Team::where('status',1)->orderBy('created_at','DESC')->get();
        return view('about', compact('pages','teams'));
    }
}
