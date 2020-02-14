<?php

namespace App\Providers;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Auth::extend('extended_session', function ($app, $name, $config) {
        //     $providerConfig = $this->app['config']['auth.providers.'.$config['provider']];
        //     // If you don't use eloquent you need to alter the next line accordingly
        //     $provider = new EloquentUserProvider($app['hash'], $providerConfig['model']);
        //     return new SessionGuardExtended('extended_session', $provider, $this->app['session.store']);
        // });
    }
}
