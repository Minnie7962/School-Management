<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-students', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-teachers', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-courses', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-classes', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-attendances', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-grades', function ($user) {
            return $user->role === 'admin';
        });
    }
}
