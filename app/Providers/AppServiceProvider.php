<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dotenv\Dotenv;


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
        // $stage = env('STAGE', 'production'); // default to 'production' if STAGE is not set
        // $stage = strtolower($stage); // Convert to lowercase to handle case-insensitivity

        // if ($stage === 'production') {
        //     $envFile = '.env_production';
        // } elseif ($stage === 'uat') {
        //     $envFile = '.env_uat';
        // } else {
        //     $envFile = '.env'; // fallback to default .env file
        // }

        // if (file_exists(base_path($envFile))) {
        //     Dotenv::createImmutable(base_path(), $envFile)->load();
        // }
    }
}
