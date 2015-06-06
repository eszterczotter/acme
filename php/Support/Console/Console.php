<?php

namespace Acme\Support\Console;

interface Console
{
    /**
     * Register a console command.
     *
     * @param string $command
     * @param string $handler
     * @return Console
     */
    public function command($command, $handler);
}
