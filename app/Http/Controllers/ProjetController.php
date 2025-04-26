<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjetController extends Controller
{
    public function index(){

        Session::put('page', 'projet');
        return view('projet');
    }
}
