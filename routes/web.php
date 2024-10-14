<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Dzakwan Irfan Ramdhani',
        'url' => 'img/fotodzakwan.png',
        'bio' => 'Saya adalah mahasiswa informatika angkatan 2022 semester 5',
        'spesialis' => ['Software Developer', 'Designer'],
        'active' => 'about',
    ]);
});

Route::get('/blog', [PostController::class, 'main']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post/{post}', [PostController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/post/{post}/edit', [PostController::class, 'edit']);
    Route::post('/post/{post}/update', [PostController::class, 'update']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);
    
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{category:slug}/update', [CategoryController::class, 'update']);
    Route::delete('/category/{category:slug}', [CategoryController::class, 'destroy']);
});

require __DIR__.'/auth.php';
