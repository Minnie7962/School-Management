<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SemesterInterface;
use App\Repositories\SemesterRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SemesterInterface::class, SemesterRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}