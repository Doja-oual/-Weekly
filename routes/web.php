<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/categories/index', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::post('/categories/{id}/delete', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategorieController::class, 'update'])->name('categories.update');


Route::get('/post/index', [PostController::class, 'show'])->name('Poste.index');
Route::get('/post/anonce', [PostController::class, 'showe'])->name('post.showe');
Route::post('/post/{id}/comment', [PostController::class, 'comment'])->name('post.comment')->middleware('auth');
Route::get('/post/post', [PostController::class, 'index'])->name('post.post');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post',[PostController::class,'store'])->name('post.store');
Route::post('/post/{post}/like', [PostController::class, 'like'])->name('post.like')->middleware('auth');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

