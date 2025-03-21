<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => ArticleController::class,
    'middleware' => 'auth'
], function () {
    Route::get('/search/{user}', 'indexByUser')->name('articlesByUser.index');
});