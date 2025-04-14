<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Force Laravel to use classic Blade error views
        $this->app->singleton('Illuminate\Contracts\Debug\ExceptionHandler', function ($app) {
            return new \Illuminate\Foundation\Exceptions\Handler($app['config']['app.debug']);
        });
    }
}