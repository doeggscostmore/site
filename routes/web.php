<?php

use App\Http\Controllers\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $categories = Cache::remember('all_categories', 8 * 60 * 60, function() {
        return ProductCategory::all(['name', 'slug']);
    });

    return response()->view('about', ['categories' => $categories]);
});
Route::get('/methodology', function () {
    $categories = Cache::remember('all_categories', 8 * 60 * 60, function() {
        return ProductCategory::all(['name', 'slug']);
    });

    return response()->view('methodology', ['categories' => $categories]);
});

Route::get('/{id}', [ProductController::class, 'product']);
Route::get('/', [ProductController::class, 'home']);

// Some SEO redirect links in case people forget
Route::get('/prices/{id}', function($id) {
    return redirect(url('/' . $id));
});
