<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.post.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|min:3',
            'konten' => 'required|min:5'
        ]);

        Post::create($validatedData);

        return redirect('/post')->with('success', 'Post Anda berhasil dibuat!');
    }

    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|min:3',
            'konten' => 'required|min:5'
        ]);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/post')->with('success', 'Post Anda berhasil diubah!');
    }
}
