<?php

namespace Acme\Support\Environment;

use Acme\Support\Container\ServiceProvider;

class EnvironmentServiceProvider extends ServiceProvider
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
            Environment::class,
            'env',
        ];
    }
}
