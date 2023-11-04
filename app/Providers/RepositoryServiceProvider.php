<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Register services.
     */
    public function register(): void {
        //
        $this->app->bind(\App\Interfaces\BookRepositoryInterface::class, \App\Repositories\BookRepository::class);
        $this->app->bind(\App\Interfaces\PermissionRepositoryInterface::class, \App\Repositories\PermissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        //
    }
}
