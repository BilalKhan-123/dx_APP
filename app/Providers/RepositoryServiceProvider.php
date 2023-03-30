<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\EloquentRepositoryInterface;
use App\Repositories\EloquentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, EloquentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
