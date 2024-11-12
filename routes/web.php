<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/check/{id}', [ProductController::class, 'product']);
Route::get('/', [ProductController::class, 'home']);

Route::get('/about', function () {
    return response()->view('about');
});
