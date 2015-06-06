<?php

namespace Acme\Application\Cli;

use Symfony\Component\Console\Application as Console;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $config = $this->container()->get('config');
        $console = new Console($config->get('app.name'), $config->get('app.version'));
        $console->run();
    }
}
