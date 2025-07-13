<?php

use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::prefix('api')->group(function () {
    Route::apiResource('mahasiswa', MahasiswaController::class);
});