<?php

use App\Data;
use App\Http\Controllers\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $categories = Data::Categories();
    return response()->view('about', ['categories' => $categories]);
});
Route::get('/privacy', function () {
    $categories = Data::Categories();
    return response()->view('privacy', ['categories' => $categories]);
});
Route::get('/methodology', function () {
    $categories = Data::Categories();
    return response()->view('methodology', ['categories' => $categories]);
});

Route::get('/prices/{id}', [ProductController::class, 'product']);
Route::get('/', [ProductController::class, 'home']);
