<?php

namespace Acme\Support\Console;

use Acme\Support\Container\Container;
use Acme\Support\Container\LeagueContainer;
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
        $container->singleton('Acme\Support\Console\Console', new LeagueContainer());
        $container->alias('console', 'Acme\Support\Console\Console');
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
