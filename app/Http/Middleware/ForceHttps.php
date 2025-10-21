<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, что мы в продакшене
        if (config('app.env') === 'production') {
            // Проверяем HTTPS
            if (!$request->isSecure()) {
                // Принудительное перенаправление на HTTPS
                return redirect()->secure($request->getRequestUri(), 301);
            }

            // Принудительное использование HTTPS для всех URL
            \URL::forceScheme('https');
        }

        return $next($request);
    }
}
