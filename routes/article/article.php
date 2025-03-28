<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as'         => 'articles.',
    'prefix'     => 'articles',
    'controller' => ArticleController::class,
], function () {
    Route::get('/', 'index')->name('index');
    Route::middleware(['auth'])->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{article}', 'show')->name('show')
            ->can('view', 'article');
        Route::get('/{article}/edit', 'edit')->name('edit')
            ->can('update', 'article');
        Route::put('/{article}', 'update')->name('update')
            ->can('update', 'article');
        Route::delete('/{article}', 'destroy')->name('destroy')
            ->can('delete', 'article');
    });
});
