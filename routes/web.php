<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth'])->name('profile');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('author.show');
//Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');


// Public post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('post.like')->middleware('auth');
});

// Authors
Route::get('/author/{user}', [AuthorController::class, 'show'])->name('author.show');

// Search route
Route::get('/search', [SearchController::class, 'index'])->name('search');

// 🔒 Protected post creation routes (must come before /posts/{id})
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{id}/comments', [PostController::class, 'storeComment'])->name('comments.store');
});

// 📄 Show individual post
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// 🔒 Protected post destroy route
Route::middleware('auth')->group(function () {
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

//Route::get('/author/{id}', [ProfileController::class, 'show'])->name('author.show')->middleware(['auth']);

require __DIR__.'/auth.php';
