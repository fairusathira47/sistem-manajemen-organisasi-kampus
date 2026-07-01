<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use App\Services\TokenGuard;
use App\Services\SimpleUserProvider;

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
        // Register custom User Provider 'simple'
        Auth::provider('simple', function ($app, array $config) {
            return new SimpleUserProvider();
        });

        // Register custom Guard 'token'
        Auth::extend('token', function ($app, $name, array $config) {
            $guard = new TokenGuard(
                Auth::createUserProvider($config['provider']),
                $app->make('request')
            );
            $app->refresh('request', $guard, 'setRequest');
            return $guard;
        });
    }
}
