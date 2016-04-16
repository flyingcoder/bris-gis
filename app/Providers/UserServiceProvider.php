<?php

namespace brisgis\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'brisgis\Repositories\Contracts\UserRepositoryInterface',
            'brisgis\Repositories\UserRepositoryDB'
        );

        $this->app->bind(
            'brisgis\Output\Contracts\UserShowInterface',
            'brisgis\Output\UserShowText'
        );
    }
}
