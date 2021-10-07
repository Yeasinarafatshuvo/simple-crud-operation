<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class, 'show_post'])->name('home');


Route::middleware(['auth'])->group(function(){
    // Route::get('/post', [PostController::class, 'index'])->middleware('can:isAdmin')->name('post_index');
    Route::get('/post', [PostController::class, 'index'])->middleware(['can:isAdmin, App\Models\Post'])->name('post_index');
    Route::post('/post', [PostController::class, 'create'])->name('post_create');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post_edit');
    Route::put('/post/edit/{id}', [PostController::class, 'update'])->name('post_update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post_destroy');
});


Route::get('/dashboard', [Dashboard::class, 'show_post'])->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
