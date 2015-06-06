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

    /**
     * Get the handler of a command.
     *
     * @param string $command
     */
    public function handler($command);

    /**
     * Set the name.
     *
     * @param string $name
     * @return Console
     */
    public function name($name);

    /**
     * Set the version.
     *
     * @param string $version
     * @return Console
     */
    public function version($version);
}
