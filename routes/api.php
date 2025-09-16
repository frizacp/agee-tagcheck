<?php

use App\Http\Controllers\TagCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(TagCheck::class)->group(function () {
    Route::get('/tagcheck', 'findall')->name('tagcheck.findall');
    Route::patch('/tagcheck', 'update')->name('tagcheck.update');
    Route::post('/tagcheck', 'store')->name('tagcheck.store');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
