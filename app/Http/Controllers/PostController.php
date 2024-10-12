<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255|min:3',
            'konten' => 'required|min:5',
            'category_id' => 'required',
            'image' => 'image|file',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image', 'public');
        }

        $post->update($validatedData);
        if($post){
            return redirect('/post')->with('success', 'Post Anda berhasil diubah!');
        }else{
            return redirect('/post')->with('error', 'Post Anda gagal diubah!');
        }
    }

    public function destroy(Post $post){
        Post::destroy($post->id);
        return redirect('/post')->with('success', 'Post Anda berhasil dihapus!');
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
            'active' => 'blog',
        ]);
    }
}
