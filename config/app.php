<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;

return [
    'name' => env('APP_NAME', 'Laravel'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL', null),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],
    'providers' => [


        Illuminate\Auth\AuthServiceProvider::class, // Authentication (login, register, passwords)
        Illuminate\Broadcasting\BroadcastServiceProvider::class, // Broadcasting events
        Illuminate\Bus\BusServiceProvider::class, // Job and task handling
        Illuminate\Cache\CacheServiceProvider::class, // Caching mechanisms
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class, // Artisan commands
        Illuminate\Cookie\CookieServiceProvider::class, // Handling cookies
        Illuminate\Database\DatabaseServiceProvider::class, // Database and Eloquent ORM
        Illuminate\Encryption\EncryptionServiceProvider::class, // Security and encryption
        Illuminate\Filesystem\FilesystemServiceProvider::class, // File handling (storage, uploads)
        Illuminate\Foundation\Providers\FoundationServiceProvider::class, // Core Laravel functionalities
        Illuminate\Hashing\HashServiceProvider::class, // Password hashing
        Illuminate\Mail\MailServiceProvider::class, // Sending emails
        Illuminate\Notifications\NotificationServiceProvider::class, // User notifications
        Illuminate\Pagination\PaginationServiceProvider::class, // Pagination handling
        Illuminate\Pipeline\PipelineServiceProvider::class, // Middleware pipeline system
        Illuminate\Queue\QueueServiceProvider::class, // Queue system
        Illuminate\Redis\RedisServiceProvider::class, // Redis cache and session support
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class, // Password resets
        Illuminate\Session\SessionServiceProvider::class, // Session handling
        Illuminate\Translation\TranslationServiceProvider::class, // Language translation
        Illuminate\Validation\ValidationServiceProvider::class, // Form validation
        Illuminate\View\ViewServiceProvider::class, // Blade templating engine

        /*
        |--------------------------------------------------------------------------
        | Application Service Providers
        |--------------------------------------------------------------------------
        | Custom application-specific providers (Defined in your app/Providers folder)
        */

        App\Providers\AppServiceProvider::class, // Custom application logic (e.g., helper functions, global bindings)
//        App\Providers\AuthServiceProvider::class, // Custom authentication logic and policies
//        App\Providers\EventServiceProvider::class, // Event-listeners and event broadcasting
//        App\Providers\RouteServiceProvider::class, // Route configurations

        /*
        |--------------------------------------------------------------------------
        | Additional Providers (Add if Needed)
        |--------------------------------------------------------------------------
        */
//         App\Providers\BroadcastServiceProvider::class, // Enable if using broadcasting (WebSockets, Pusher)
//         App\Providers\FortifyServiceProvider::class, // Enable if using Laravel Fortify (Custom authentication)
//         App\Providers\JetstreamServiceProvider::class, // Enable if using Laravel Jetstream
//         App\Providers\HorizonServiceProvider::class, // Enable if using Laravel Horizon for queues
//         App\Providers\ScoutServiceProvider::class, // Enable if using Laravel Scout for full-text search
//         App\Providers\TelescopeServiceProvider::class, // Enable if using Laravel Telescope for debugging
    ],

    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'Seo' => App\Facades\Seo::class,
    ],

];
