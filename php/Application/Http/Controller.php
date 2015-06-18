<?php

namespace Acme\Application\Http;

use Acme\Support\Container\Container;

class Controller
{
    protected function respond($content)
    {
        $response = Container::instance()->get('response');
        $response->getBody()->write($content);
        return $response;
    }
}
