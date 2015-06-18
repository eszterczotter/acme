<?php

namespace Acme\Application\Http;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $server = $this->container()->get('server');
        $server->serve();
    }
}
