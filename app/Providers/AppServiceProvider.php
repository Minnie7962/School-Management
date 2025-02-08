<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Services\UserService;
use App\Interfaces\SchoolSessionInterface;
use App\Repositories\SchoolSessionRepository;
use App\Interfaces\SchoolClassInterface;
use App\Repositories\SchoolClassRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserService::class);
        $this->app->bind(SchoolSessionInterface::class, SchoolSessionRepository::class);
        $this->app->bind(SchoolClassInterface::class, SchoolClassRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
