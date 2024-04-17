<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request){
        $posts = Post::with('category');
        if($q = $request->query('search')){
            $q = str_replace('-', ' ', Str::slug($q));

            $posts = $posts->whereRaw('MATCH(title, excerpt, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$q]);
        }
        $posts = $posts->paginate(5);

        $latest_posts = Post::with('category')->latest()->get();
        $categories = Category::with('post')->get();
        return view('frontend.blog.index', compact('posts', 'latest_posts', 'categories', 'q'));
    }

    public function show($slug){
        $post = Post::with('category')->whereSlug($slug)->firstOrFail();
        $latest_posts = Post::with('category')->latest()->get();
        $categories = Category::with('post')->get();

        return view('frontend.blog.show', compact('post','latest_posts', 'categories'));
    }

    

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)->paginate(5); 
        $latest_posts = Post::with('category')->latest()->get();
        $categories = Category::with('post')->get();

        return view('frontend.blog.index', [
            'posts' => $posts, 
            'latest_posts' => $latest_posts,
            'categories' => $categories
        ]);
    }
}
