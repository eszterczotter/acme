<?php

namespace Acme\Application\Http\Web;

class Application extends \Acme\Application\Http\Application
{
    public function run()
    {
        $server = $this->container()->get('server');
        $server->serve();
    }
}
