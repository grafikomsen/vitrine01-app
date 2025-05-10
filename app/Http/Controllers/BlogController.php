<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(){

        $blogs = Blog::where('status',1)->orderBy('created_at','DESC')->get();
        $faqs = Faq::where('status',1)->orderBy('created_at','ASC')->get();

        Session::put('page', 'blog');
        return view('blog', compact('blogs','faqs'));
    }

    public function detail($blogSlug){

        $blog = Blog::find($blogSlug);
        $blog = Blog::where('slug',$blogSlug)->first();
        if (empty($blog)) {
            # code...
            return redirect('/');
        }

        SEOMeta::setTitle($blog->name);
        SEOMeta::setDescription($blog->short_desc);
        SEOMeta::addMeta('article:published_time', $blog->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $blog->category, 'property');
        SEOMeta::addKeyword([$blog->name]);

        OpenGraph::setDescription($blog->description);
        OpenGraph::setTitle($blog->name);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        //OpenGraph::addImage($blog->cover->url);
        //OpenGraph::addImage($blog->images->list('url'));
        //OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        //OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($blog->title);
        JsonLd::setDescription($blog->description);
        JsonLd::setType('Article');
        //JsonLd::addImage($blog->images->list('url'));


        $faqs = Faq::where('status',1)->orderBy('created_at','DESC')->get();
        return view('blog-detail', compact('blog','faqs'));
    }
}
