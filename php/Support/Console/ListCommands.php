<?php

namespace Acme\Support\Console;

class ListCommands implements Command
{
    /**
     * The commands to list.
     *
     * @var array
     */
    private $commands;

    /**
     * @param array $commands
     */
    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    /**
     * Handle the command.
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function handle(Input $input, Output $output)
    {
        $output->info('Acme 0.0.0');
    }

    /**
     * Configure the arguments.
     *
     * @return array
     */
    public function arguments()
    {
        return [];
    }
}
