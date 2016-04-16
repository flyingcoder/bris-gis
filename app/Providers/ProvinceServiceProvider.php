<?php

namespace brisgis\Providers;

use Illuminate\Support\ServiceProvider;

class ProvinceServiceProvider extends ServiceProvider
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
            'brisgis\Repositories\Contracts\ProvinceRepositoryInterface',
            'brisgis\Repositories\ProvinceRepositoryDB'
        );

        $this->app->bind(
            'brisgis\Output\Contracts\ProvinceShowInterface',
            'brisgis\Output\ProvinceShowText'
        );
    }
}