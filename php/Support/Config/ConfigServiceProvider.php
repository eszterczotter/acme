<?php

namespace Acme\Support\Config;

use Acme\Support\Container\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            'config',
            Config::class
        ];
    }
}
