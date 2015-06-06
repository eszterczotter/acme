<?php

namespace Acme\Application\Http\Api;

class Application extends \Acme\Application\Http\Application
{
    public function run()
    {
        $config = $this->container()->get('config');
        echo "API" .
             " " . $config->get('app.version');
    }
}
