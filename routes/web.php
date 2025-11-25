<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])
->middleware(['auth', 'verified'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
->middleware(['auth', 'verified'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
->middleware(['auth', 'verified'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
->middleware(['auth', 'verified'])->name('post.show');

Route::patch('/posts/{id}', [PostController::class, 'update'])
->middleware(['auth', 'verified'])->name('posts.update');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
->middleware(['auth', 'verified'])->name('post.edit');

require __DIR__.'/auth.php';
