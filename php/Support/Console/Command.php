<?php

namespace Acme\Support\Console;

interface Command
{
    /**
     * Handle the command.
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function handle(Input $input, Output $output);

    /**
     * Configure the arguments.
     *
     * @return array
     */
    public function arguments();

    /**
     * Get the command's name.
     *
     * @return string
     */
    public function name();

    /**
     * Get the command's description.
     *
     * @return string
     */
    public function description();
}
