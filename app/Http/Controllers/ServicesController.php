<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    public function index(){

        $services = Service::where('status',1)->orderBy('created_at','DESC')->get();

        Session::put('page', 'services');
        return view('services', compact('services'));
    }

    public function detail($serviceId){

        $service = Service::where('id',$serviceId)->first();
        if (empty($service)) {
            # code...
            return redirect('/');
        }

        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('service-detail', compact('service','faqs'));
    }
}
