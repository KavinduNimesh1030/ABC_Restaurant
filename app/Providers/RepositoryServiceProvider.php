<?php

namespace App\Providers;

use App\Repositories\interfaces\PostRepositoryInterface;
use App\Repositories\interfaces\StaffRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\StaffRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
