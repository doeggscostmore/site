<?php

use App\Data;
use App\Http\Controllers\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

// Basic page view
Route::view('/about', 'about')
    ->name('about');
Route::view('/privacy', 'privacy')
    ->name('privacy');
Route::view('/methodology', 'methodology')
    ->name('methodology');

// Price Categories (The home page is partly a category page)
Route::get('/prices/{id}', [ProductController::class, 'product'])
    ->name('product');
Route::get('/', [ProductController::class, 'home'])
    ->name('home');
