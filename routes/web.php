<?php

use App\Http\Controllers\TagCheck;
use Illuminate\Support\Facades\Route;

Route::controller(TagCheck::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/{type}/{event}', 'index')
        ->where('type', 'resultcheck|tagcheck')
        ->name('event.page');
});
