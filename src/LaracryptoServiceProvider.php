<?php

namespace Andskur\Laracrypto;

use Illuminate\Support\ServiceProvider;
use Andskur\Laracrypto\BlockchainContainer as Blockchain;

class LaracryptoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/laracrypto.php' => config_path('laracrypto.php'),
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
