<?php

namespace App\Providers;

use App\Helpers\QueryBuilderHelper;
use Illuminate\Database\Eloquent\Builder;
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
        $this->registerQueryBuilderMacros();
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

    private function registerQueryBuilderMacros()
    {
        Builder::macro('sortingQuery', function () {
            return QueryBuilderHelper::sortingQuery($this);
        });

        Builder::macro('searchQuery', function () {
            return QueryBuilderHelper::searchQuery($this);
        });

        Builder::macro('paginationQuery', function () {
            return QueryBuilderHelper::paginationQuery($this);
        });

        Builder::macro('filterQuery', function () {
            return QueryBuilderHelper::filterQuery($this);
        });

        Builder::macro('filterDateQuery', function () {
            return QueryBuilderHelper::filterDateQuery($this);
        });
    }
}