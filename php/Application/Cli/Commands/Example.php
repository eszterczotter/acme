<?php

namespace Acme\Application\Cli\Commands;

use Acme\Support\Console\Command;
use Acme\Support\Console\Input;
use Acme\Support\Console\Output;

class Example implements Command
{

    /**
     * Handle the command.
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function execute(Input $input, Output $output)
    {
        $output->info('Example works.');
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

    /**
     * Get the command's name.
     *
     * @return string
     */
    public function name()
    {
        return 'example';
    }

    /**
     * Get the command's description.
     *
     * @return string
     */
    public function description()
    {
        return 'Just a silly example.';
    }
}
