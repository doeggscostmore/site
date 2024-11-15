<?php

use App\Data;
use App\Http\Controllers\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $categories = Cache::remember('all_categories', Data::CACHE_TIME, function() {
        return ProductCategory::all(['name', 'slug']);
    });

    return response()->view('about', ['categories' => $categories]);
});
Route::get('/methodology', function () {
    $categories = Cache::remember('all_categories', Data::CACHE_TIME, function() {
        return ProductCategory::all(['name', 'slug']);
    });

    return response()->view('methodology', ['categories' => $categories]);
});

Route::get('/{id}', [ProductController::class, 'product']);
Route::get('/', [ProductController::class, 'home']);
