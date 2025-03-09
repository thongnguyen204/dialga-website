<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showForm']);
Route::post('login', [LoginController::class, 'authencicate'])->name('login');
Route::get('register', [RegisterController::class, 'showForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
