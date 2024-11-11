<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Coming soon', 200)
        ->header('Content-Type', 'text/plain');;
});
