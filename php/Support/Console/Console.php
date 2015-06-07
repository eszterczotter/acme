<?php

namespace Acme\Support\Console;

interface Console
{
    /**
     * Add a command to the console.
     *
     * @param string $command
     * @return Console
     */
    public function command($command);

    /**
     * Execute script.
     *
     * @return void
     */
    public function execute();

    /**
     * Set the name.
     *
     * @param Command $name
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
