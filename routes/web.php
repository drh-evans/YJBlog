<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\StandingsController;
use App\Http\Controllers\AdminController;
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

Route::middleware(['can:access-admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/posts', [AdminController::class, 'postsIndex'])->name('admin.posts');
    Route::get('/admin/dashboard/comments', [AdminController::class, 'commentsIndex'])->name('admin.comments');
    Route::get('/admin/dashboard/users', [AdminController::class, 'usersIndex'])->name('admin.users');

    Route::patch('/admins/dashboard/users/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::get('/admins/dashboard/users/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit-user');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.myPosts');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/comment/{id}', [CommentController::class, 'show'])->name('comment.show');


    Route::get('/fans', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/fans/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::patch('/fans/{id}', [AccountController::class, 'update'])->name('account.update');
    Route::get('/fans/{id}/edit', [AccountController::class, 'edit'])->name('account.edit');

    Route::get('/standings', [StandingsController::class, 'index'])->name('standings.index');

    Route::get('/stadiums', [StadiumController::class, 'index'])->name('stadiums.index');
    Route::post('/stadiums', [StadiumController::class, 'store'])->name('stadiums.store');
    Route::get('/stadiums/{id}', [StadiumController::class, 'show'])->name('stadium.show');
});


require __DIR__.'/auth.php';
