<?php

use App\Data;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RedditApi;
use App\Http\Controllers\UpdatesController;
use App\Http\Middleware\ApiToken;
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
Route::view('/bot', 'bot')
    ->name('bot');

// Price Categories (The home page is partly a category page)
Route::get('/prices/{id}', [ProductController::class, 'product'])
    ->name('product');
Route::get('/', [ProductController::class, 'home'])
    ->name('home');

// Event Pages
Route::get('/events/{id}', [EventController::class, 'event'])
    ->name('event');

// Updates 
Route::get('/updates', [UpdatesController::class, 'updates'])
    ->name('updates');
Route::get('/updates/{slug}', [UpdatesController::class, 'post'])
    ->name('update-post');

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

// API Routes
Route::middleware([ApiToken::class])->prefix('api')->group(function(){
    Route::post('/reddit/comment', [RedditApi::class, 'comment']);
});