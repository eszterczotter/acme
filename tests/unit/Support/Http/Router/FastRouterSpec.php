<?php

namespace unit\Acme\Support\Http\Router;

use Acme\Support\Http\Router\Router;
use FastRoute\RouteCollector;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FastRouterSpec extends ObjectBehavior
{
    function let(RouteCollector $collection)
    {
        $this->beConstructedWith($collection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Router::class);
    }

    function it_registers_a_route(RouteCollector $collection)
    {
        $method = 'GET';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->route($method, $path, [$controller, $action])->shouldReturn($this);

        $collection->addRoute($method, $path, [$controller, $action])->shouldHaveBeenCalled();
    }
}
