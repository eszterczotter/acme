<?php

namespace Acme\Support\Console;

use Acme\Support\Container\Container;

class LeagueConsole implements Console
{
    /**
     * The Container.
     *
     * @var Container
     */
    private $container;

    /**
     * The console commands.
     *
     * @var array
     */
    private $commands = [];

    /**
     * Create a new console.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Register a console command.
     *
     * @param string $command
     * @param string $handler
     * @return Console
     */
    public function command($command, $handler)
    {
        $this->commands[$command] = $handler;
    }

    /**
     * Execute script.
     *
     * @return void
     */
    public function execute()
    {
        // TODO: Implement execute() method.
    }

    /**
     * Get the handler of a command.
     *
     * @param string $command
     * @return Command
     */
    public function handler($command)
    {
        if (array_key_exists($command, $this->commands)) {
            return $this->container->get($this->commands[$command]);
        }
        return null;
    }
}
