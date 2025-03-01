<?php

use Illuminate\Support\Facades\Route;

include_once 'auth/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');
