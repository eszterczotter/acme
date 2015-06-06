<?php

namespace Acme\Support\Console;

use Acme\Support\Container\LeagueContainer;
use Acme\Support\Container\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Console::class, new LeagueContainer());
        $this->container->alias('console', Console::class);
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

    /**
     * Configure the console.
     *
     * @param Console $console
     */
    public function configure(Console $console)
    {
        // TODO: write logic here
    }
}
