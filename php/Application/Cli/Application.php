<?php

namespace Acme\Application\Cli;

use Symfony\Component\Console\Application as Console;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $console = new Console("Acme", "0.0.0");
        $console->run();
    }
}
