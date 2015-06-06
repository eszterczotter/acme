<?php

namespace Acme\Support\Console;

use Acme\Support\Config\Config;
use Acme\Support\Container\ServiceProvider;
use League\CLImate\CLImate;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Console::class, new LeagueConsole($this->container, new CLImate()));
        $this->container->alias('console', Console::class);
        $this->container->inflector(Console::class, [$this, 'configure']);
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
        $config = $this->container->get('config');
        $commands = $config->get('console.commands');
        foreach ($commands as $command => $handler) {
            $console->command($command, $handler);
        }
    }
}
