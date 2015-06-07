<?php

namespace Acme\Application\Cli;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $config = $this->container()->get('config');
        $console = $this->container()->get('console');

        $console
            ->name($config->get('app.name'))
            ->version($config->get('app.version'))
            ->execute();
    }
}
