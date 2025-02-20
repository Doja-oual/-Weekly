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
Route::post('/categories.store', [CategorieController::class, 'store'])->name('store');
Route::get('/post',[PostController::class,'index'])->name('post');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/create',[PostController::class,'create'])->name('post.create');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

