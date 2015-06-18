<?php

namespace Acme\Application\Http;

class Application extends \Acme\Application\Application
{
    public static function create($basePath)
    {
        if (strpos($_SERVER['REQUEST_URI'], '/api') === 0) {
            return new Api\Application($basePath);
        } else {
            return new Web\Application($basePath);
        }
    }

    public function run()
    {
        $server = $this->container()->get('server');
        $server->serve();
    }
}
