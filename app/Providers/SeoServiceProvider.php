<?php

namespace App\Providers;

use App\Helpers\SeoHelper;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('seo', function ($app) {
            return new SeoHelper();
        });
    }

    /**
     * Bootstrap services.
     */
public function boot(): void
{
    // Register the SEO configuration
    $this->mergeConfigFrom(
        __DIR__.'/../../config/seo.php', 'seo'
    );
}
}
