<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\App\Repositories\DuesRepository::class, \App\Repositories\DuesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DueItensRepository::class, \App\Repositories\DueItensRepositoryEloquent::class);
        //:end-bindings:
    }
}
