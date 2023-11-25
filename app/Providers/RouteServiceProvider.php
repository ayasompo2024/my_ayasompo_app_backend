<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doc\DocController;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            // Web Admn
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('admin/backup')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/backup.php'));
            Route::prefix('doc')->group(function () {
                Route::get('index', [DocController::class, 'index'])->name("doc.index");
                Route::get('index/{file}', [DocController::class, 'getContent'])->name("doc.index.file");
            });
            Route::prefix('admin/messaging')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/messaging.php'));

            // App Api
            Route::prefix('api/app')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/app/api.php'));
            Route::prefix('api/app')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/app/customer.php'));

            // Internal Api
            Route::prefix('api/internal')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/internal/api.php'));

            // Admin Api
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/api.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}