<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return inertia('Posts/index', [
            'filter' => request('search'),
            'posts' => Post::latest()
                        ->filter(request('search'))
                        ->paginate(15)
                        ->withQueryString() //append all query string with pagination url
            //this method make not forget query string after pagination links click
        ]);
    }

    public function create()
    {
        return inertia('Posts/create');
    }

    public function store()
    {
        Post::create(request()->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]));
        return redirect()->route('posts.index')->with('success', 'post created');
    }

    public function edit(Post $post)
    {
        return inertia('Posts/edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $post->update(request()->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]));
        return redirect()->route('posts.index')->with('success', 'post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('danger', 'post deleted');
    }
}
