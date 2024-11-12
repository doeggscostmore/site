<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return response()->view('about');
});
Route::get('/methodology', function () {
    return response()->view('methodology');
});

Route::get('/{id}', [ProductController::class, 'product']);
Route::get('/', [ProductController::class, 'home']);
