<?php

namespace App\Providers;

use App\Repository\authRepo;
use App\Repository\majorRepo;
use App\Repository\majorRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
