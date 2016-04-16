<?php

namespace brisgis\Providers;

use Illuminate\Support\ServiceProvider;

class BarangayServiceProvider extends ServiceProvider
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
            'brisgis\Repositories\Contracts\BarangayRepositoryInterface',
            'brisgis\Repositories\BarangayRepositoryDB'
        );

        $this->app->bind(
            'brisgis\Output\Contracts\BarangayShowInterface',
            'brisgis\Output\BarangayShowText'
        );
    }
}
