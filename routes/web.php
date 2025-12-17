<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisController;

Route::get('/', [ArticleController::class, 'home'])->name('home');

Route::get('/presentation', function () {
    return view('statiques.presentation');
})->name('presentation');

Route::post('/articles/{article}/avis', [AvisController::class, 'store'])->name('avis.store');
Route::delete('/avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');


// Liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::post('/articles/{article}/like', [LikeController::class, 'like'])
    ->name('articles.like');
Route::post('/articles/{article}/dislike', [LikeController::class, 'dislike'])
    ->name('articles.dislike');

Route::patch('/articles/{article}/toggle', [ArticleController::class, 'toggle'])
    ->middleware('auth')
    ->name('articles.toggle');

Route::get('/articles/create', [ArticleController::class, 'create'])
    ->middleware('auth')
    ->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])
    ->middleware('auth')
    ->name('articles.store');

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
    ->middleware('auth')
    ->name('articles.edit');

Route::put('/articles/{article}', [ArticleController::class, 'update'])
    ->middleware('auth')
    ->name('articles.update');

Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])
    ->middleware('auth')
    ->name('articles.destroy');

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

Route::get('/profil/modifier', [UserController::class, 'edit'])->name('profil.edit');
Route::put('/profil/modifier', [UserController::class, 'update'])->name('profil.update');