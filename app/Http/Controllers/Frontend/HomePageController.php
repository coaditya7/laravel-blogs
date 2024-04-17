<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(3)->get();
        $categories = Category::with('post')->get();

        SEOMeta::setTitle('Beranda - Self Development');
        SEOMeta::setDescription('Peningkatan Skill untuk dimasa yang akan datang');

        OpenGraph::setDescription('Peningkatan Skill untuk dimasa yang akan datang');
        OpenGraph::setTitle('Beranda - Self Development');
        OpenGraph::addProperty('type', 'articles');

        JsonLd::setTitle('Beranda - Self Development');
        JsonLd::setDescription('Peningkatan Skill untuk dimasa yang akan datang');
        
        return view('frontend.homepage', ['posts' => $posts, 'categories' => $categories]);
    }
}
