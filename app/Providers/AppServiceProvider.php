<?php

namespace App\Providers;

use App\Data;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Depending on the state of the environment, this might fail.  If it
        // does, we just ignore it. This will still throw an error, which is
        // what we want.
        try {
            View::share('categories', Data::Categories());
            View::share('events', Data::Events());
        } catch (Exception $e) {
            //
        }
    }
}
