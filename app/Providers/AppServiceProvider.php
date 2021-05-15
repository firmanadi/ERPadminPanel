<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Interfaces\UsersInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Interfaces\PermissionInterface',
            'App\Repositories\PermissionRepository'
        );

        $this->app->bind(
            'App\Interfaces\RoleInterface',
            'App\Repositories\RoleRepository'
        );
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
