<?php

use App\Http\Controllers\TagCheck;
use Illuminate\Support\Facades\Route;


Route::controller(TagCheck::class)->group(function () {
    Route::get('/', 'index')->name('tagcheck.index');
    Route::get('/tagcheck/mhm25', 'index')->name('tagcheck.mhm25');
    Route::get('/resultcheck/mhm25', 'index')->name('resultcheck.mhm25');

    Route::get('/tagcheck/ugmtr25', 'index')->name('tagcheck.ugmtr25');
    Route::get('/resultcheck/ugmtr25', 'index')->name('resultcheck.ugmtr25');

    Route::get('/tagcheck/pml25', 'index')->name('tagcheck.pml25');
    Route::get('/resultcheck/pml25', 'index')->name('resultcheck.pml25');
});
