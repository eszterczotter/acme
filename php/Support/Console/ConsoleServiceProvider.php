<?php

namespace Acme\Support\Console;

use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;

class ConsoleServiceProvider implements ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @param Container $container
     * @return void
     */
    public function register(Container $container)
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
            'console',
            'Acme\Support\Console\Console',
        ];
    }
}
