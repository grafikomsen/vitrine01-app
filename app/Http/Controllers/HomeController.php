<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Partern;
use App\Models\Service;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){

        SEOMeta::setTitle('Nettoyage professionnel Sénégal');
        SEOMeta::setDescription('Le nettoyage professionnel au Sénégal est un secteur en pleine croissance, NPS facilite le quotidien des entreprises, institutions, particuliers soucieux d’hygiène et de propreté.');
        SEOMeta::addKeyword(['Nettoyage professionnel Sénégal', 'Nettoyage professionnel Mbour', 'Nettoyage professionnel Saly', 'Nettoyage professionnel Somone']);
        SEOMeta::setCanonical(route('home'));

        OpenGraph::setDescription('Le nettoyage professionnel au Sénégal est un secteur en pleine croissance, NPS facilite le quotidien des entreprises, institutions, particuliers soucieux d’hygiène et de propreté.');
        OpenGraph::setTitle('Nettoyage professionnel Sénégal');
        OpenGraph::setUrl(route('home'));
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Nettoyage professionnel Sénégal');
        TwitterCard::setSite('@NettoyageprofessionnelSénégal');

        JsonLd::setTitle('Nettoyage professionnel Sénégal');
        JsonLd::setDescription('Le nettoyage professionnel au Sénégal est un secteur en pleine croissance, NPS facilite le quotidien des entreprises, institutions, particuliers soucieux d’hygiène et de propreté.');
        JsonLd::addImage('http://127.0.0.1:8000/uploads/pages/page-1737503977-1.jpeg');

        $pages      = Page::where('status',1)->first();
        $blogs      = Blog::where('status',1)->orderBy('created_at','DESC')->take(3)->get();
        $parterns   = Partern::where('status',1)->orderBy('created_at','DESC')->take(4)->get();
        $services   = Service::where('status',1)->orderBy('created_at','DESC')->get();
        $banners    = Banner::where('status',1)->orderBy('created_at','DESC')->get();
        $faqs       = Faq::where('status',1)->orderBy('created_at','ASC')->get();

        Session::put('page', 'home');
        return view('home', compact('services','blogs','pages','banners','parterns','faqs'));
    }
}
