<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
        // Use a view composer to share the cspNonce with all views
        View::composer('*', function ($view) {
            // Generate a random nonce
            $nonce = base64_encode(Str::random(16));
            app()->instance('cspNonce', $nonce);
            $view->with('cspNonce', $nonce);
        });
    }
}
