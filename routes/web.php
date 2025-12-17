<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'home'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::post('/articles/{article}/like', [LikeController::class, 'store'])
    ->name('articles.like');

Route::get('/presentation', function () {
    return view('statiques.presentation');
})->name('presentation');


// Liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])
    ->middleware('auth')
    ->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');

Route::get('/contact', function () {
    return view('statiques.contact');
})->name('contact');

Route::get('/home', function () {
    return view('profil.show');
})->name("home");

Route::get('/profil', [UserController::class, 'show'])->name('profil.show');
Route::get('/home', fn() => redirect()->route('profil.show'));
Route::get('/profil/modifier', [UserController::class, 'edit'])->name('profil.edit');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/rythmes/{id}', [ArticleController::class, 'byRythme'])->name('articles.byRythme');

Route::get('/profil/{id}', [UserController::class, 'voirProfilPublic'])->name('profil.user');
Route::post('/utilisateur/{id}/suivre', [UserController::class, 'toggleSuivi'])->name('utilisateur.suivre');