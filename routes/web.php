<?php

use App\Http\Controllers\TagCheck;
use Illuminate\Support\Facades\Route;


Route::controller(TagCheck::class)->group(function () {
    Route::get('/', 'index')->name('tagcheck.index');
    Route::get('/resultcheck/str25', 'index')->name('resultcheck.str25');
    Route::get('/tagcheck/str25', 'index')->name('tagcheck.str25');
    Route::get('/resultcheck/ugmtr25', 'index')->name('resultcheck.ugmtr25');
    Route::get('/tagcheck/ugmtr25', 'index')->name('tagcheck.ugmtr25');
    Route::get('/resultcheck/ukr25', 'index')->name('resultcheck.ukr25');
    Route::get('/tagcheck/ukr25', 'index')->name('tagcheck.ukr25');
});
