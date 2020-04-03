<?php

namespace Ecommvu\FlatShipping\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * FlatShipping service provider
 *
 * @author  ECommvu
 * @copyright 2020 ECommvu (https://www.ecommvu.com)
 */
class FlatShippingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'flatship');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register config function
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/carrier.php', 'carriers'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/ship_matrix.php', 'ship_matrix'
        );
    }
}