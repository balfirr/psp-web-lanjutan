<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $categories = Category::all();
        return view('dashboard.post.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|min:3',
            'slug' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|file',
            'konten' => 'required|min:5',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image', 'public');
        }

        $validatedData['user_id'] = Auth::user()->id;

        $store = Post::create($validatedData);

        if($store){
            return redirect('/post')->with('success', 'Post Anda berhasil dibuat!');
        }else{
            return redirect('/post')->with('error', 'Post Anda gagal dibuat!');
        }
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

    public function destroy(Post $post){
        Post::destroy($post->id);
        return redirect('/post')->with('success', 'Post Anda berhasil dihapus!');
    }
}
