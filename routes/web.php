<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/categories', [CategorieController::class, 'index'])->name('index');
Route::post('/categories/create', [CategorieController::class, 'create'])->name('create');
Route::post('/categories.store', [CategorieController::class, 'store'])->name('store');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

