<?php

namespace App\Providers;

use App\Repository\majorRepo;
use App\Repository\majorRepoInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(majorRepoInterface::class, majorRepo::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
