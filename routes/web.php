<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->view('coming-soon');
});

Route::get('/about', function () {
    return response()->view('about');
});
