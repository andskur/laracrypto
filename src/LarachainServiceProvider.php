<?php

namespace Andskur\Larachain;

use Illuminate\Support\ServiceProvider;
use Andskur\Larachain\BlockchainContainer as Blockchain;

class LarachainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/larachain.php' => config_path('larachain.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('blockchain', function () {
            return new Blockchain;
        });
    }
}
