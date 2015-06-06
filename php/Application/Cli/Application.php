<?php

namespace Acme\Application\Cli;

use Symfony\Component\Console\Application as Console;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $config = $this->container()->get('config');
        $console = $this->container()->get('console');
        $console->name($config->get('app.name'));
        $console->version($config->get('app.version'));
        $console->execute();
    }
}
