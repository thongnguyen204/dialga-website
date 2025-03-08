<?php

use Illuminate\Support\Facades\Route;

include_once 'auth/auth.php';
include_once 'article/article.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');
