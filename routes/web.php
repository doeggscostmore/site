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

// Old SEO redirects
Route::permanentRedirect('/bread', '/prices/bread');
Route::permanentRedirect('/fresh-fruit-and-vegetables', '/prices/fresh-fruit-and-vegetables');
Route::permanentRedirect('/meat', '/prices/meat');
Route::permanentRedirect('/eggs', '/prices/eggs');
Route::permanentRedirect('/soda', '/prices/soda');
Route::permanentRedirect('/frozen-food', '/prices/frozen-food');
Route::permanentRedirect('/milk', '/prices/milk');
Route::permanentRedirect('/gas', '/prices/gas');
Route::permanentRedirect('/housing', '/prices/housing');
Route::permanentRedirect('/housing', '/prices/housing');

Route::permanentRedirect('/about/privacy', '/privacy');
Route::permanentRedirect('/about/methodology', '/methodology');
