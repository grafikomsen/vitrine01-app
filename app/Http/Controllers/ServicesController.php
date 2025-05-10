<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    public function index(){

        $services = Service::where('status',1)->orderBy('created_at','DESC')->get();

        Session::put('page', 'services');
        return view('services', compact('services'));
    }

    public function detail($serviceSlug){

        $service = Service::where('slug',$serviceSlug)->first();
        if (empty($service)) {
            # code...
            return redirect('/');
        }

        SEOMeta::setTitle($service->name);
        SEOMeta::setDescription($service->short_desc);
        SEOMeta::addMeta('article:published_time', $service->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $service->category, 'property');
        SEOMeta::addKeyword([$service->name]);

        OpenGraph::setDescription($service->description);
        OpenGraph::setTitle($service->name);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        //OpenGraph::addImage($service->cover->url);
        //OpenGraph::addImage($service->images->list('url'));
        //OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        //OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($service->title);
        JsonLd::setDescription($service->description);
        JsonLd::setType('Article');
        //JsonLd::addImage($service->images->list('url'));

        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('service-detail', compact('service','faqs'));
    }
}
