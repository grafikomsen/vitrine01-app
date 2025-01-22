<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){

        $services = Service::where('status',1)->orderBy('created_at','DESC')->get();
        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('services', compact('services','faqs'));
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
