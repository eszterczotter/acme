<?php

namespace Acme\Support\Console;

use Acme\Support\Container\Container;
use League\CLImate\CLImate;

class LeagueConsole implements Console
{
    private $description = '';

    private $version = '';

    /**
     * The console commands.
     *
     * @var array
     */
    private $commands = [];

    /**
     * The Container instance.
     *
     * @var Container
     */
    private $container;

    /**
     * The Climate instane.
     *
     * @var CLImate
     */
    private $climate;

    /**
     * Create a new console.
     *
     * @param Container $container
     * @param CLImate $climate
     */
    public function __construct(Container $container, CLImate $climate)
    {
        $this->container = $container;
        $this->climate = $climate;
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
        $this->climate->description('Acme version 0.0.0');

        global $argv;

        $arguments = $argv;

        array_shift($arguments);

        if (count($arguments) === 0) {
            $handler = new ListCommands($this->commands);
            $this->climate->arguments->add($handler->arguments());
            $this->climate->arguments->parse();
            $input = new LeagueInput($this->climate);
            $output = new LeagueOutput($this->climate);
            $handler->handle($input, $output);
        } else {
            $handler = $this->handler($arguments[0]);
            $this->climate->arguments->add($handler->arguments());
            $this->climate->arguments->parse($arguments);
            $input = new LeagueInput($this->climate);
            $output = new LeagueOutput($this->climate);
            $handler->handle($input, $output);
        }
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
