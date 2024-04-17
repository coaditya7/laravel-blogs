<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::get();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        if ($request) {
            $banner = $request->file('banner')->store('assets/post', 'public');
            $slug = Str::slug($request->title, '-');
            Post::create($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);
        }
        return redirect()->route('admin.posts.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Post $post): View
    {
        return view('admin.posts.show', compact('posts'));
    }

    public function edit(Post $post): View
    {
        $categories = Category::get();
        return view('admin.posts.edit', ['categories' => $categories, 'post' => $post]);
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        if ($request) {
            $slug = Str::slug($request->title, '-');
            if ($request->banner) {
                File::delete('storage/' . $post->banner);
                $banner = $request->file('banner')->store('assets/post', 'public');
                $post->update($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);
            } else {
                $post->update($request->validated() + ['slug' => $slug]);
            }

            return redirect()->route('admin.posts.index')->with([
                'message' => 'successfully updated !',
                'alert-type' => 'info'
            ]);
        }
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
