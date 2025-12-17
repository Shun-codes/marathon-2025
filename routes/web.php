<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'home'])->name('home');

Route::get('/presentation', function () {
    return view('statiques.presentation');
})->name('presentation');


Route::get('/liste-article', function () {
    return view('/articles/liste-article');
})->name("liste-article");

Route::get('/contact', function () {
    return view('statiques.contact');
})->name('contact');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/rythmes/{id}', [ArticleController::class, 'byRythme'])->name('articles.byRythme');
