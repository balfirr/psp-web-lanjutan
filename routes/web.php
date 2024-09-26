<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/blog', function () {
    return view('blog', [
        'active' => 'blog',
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
