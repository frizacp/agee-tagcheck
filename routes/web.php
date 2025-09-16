<?php

use App\Http\Controllers\TagCheck;
use Illuminate\Support\Facades\Route;


Route::controller(TagCheck::class)->group(function () {
    Route::get('/', 'index')->name('tagcheck.index');
    Route::get('/event/str25', 'index')->name('tagcheck.str25');
});
