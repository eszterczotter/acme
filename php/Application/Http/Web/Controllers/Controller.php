<?php

namespace Acme\Application\Http\Web\Controllers;

use Acme\Support\Container\Container;

abstract class Controller
{

    protected function respond($content)
    {
        $response = Container::instance()->get('response');
        $response->getBody()->write($content);
        return $response;
    }
}
