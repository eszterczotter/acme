<?php

namespace Acme\Support\Console;

interface Console
{
    /**
     * Add a command to the console.
     *
     * @param string $command
     * @param string $handler
     * @return Console
     */
    public function command($command, $handler);

    /**
     * Execute script.
     *
     * @return void
     */
    public function execute();
}
