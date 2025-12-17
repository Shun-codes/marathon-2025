<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('/statiques/welcome');
})->name("accueil");

Route::get('/liste-article', function () {
    return view('/article/liste-article');
})->name("liste-article");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/home', function () {
    return view('home');
})->name("home");


