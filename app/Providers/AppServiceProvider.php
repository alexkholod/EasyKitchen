<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Принудительное использование HTTPS в продакшене
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
            \URL::forceRootUrl(config('app.url'));
        }

        // Дополнительная проверка для HTTPS
        if (request()->isSecure() === false && config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        // Принудительное HTTPS для всех URL в продакшене
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
