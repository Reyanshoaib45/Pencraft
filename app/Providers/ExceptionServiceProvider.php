<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class ExceptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Fix: Pass the correct container instance to the handler constructor
        $this->app->singleton(ExceptionHandler::class, function (Container $app) {
            return new ExceptionHandler($app);
        });
    }
}