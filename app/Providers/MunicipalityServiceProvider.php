<?php

namespace brisgis\Providers;

use Illuminate\Support\ServiceProvider;

class MunicipalityServiceProvider extends ServiceProvider
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
            'brisgis\Repositories\Contracts\MunicipalityRepositoryInterface',
            'brisgis\Repositories\MunicipalityRepositoryDB'
        );

        $this->app->bind(
            'brisgis\Output\Contracts\MunicipalityShowInterface',
            'brisgis\Output\MunicipalityShowText'
        );
    }
}