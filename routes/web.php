<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'home'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/rythmes/{id}', [ArticleController::class, 'byRythme'])->name('articles.byRythme');
