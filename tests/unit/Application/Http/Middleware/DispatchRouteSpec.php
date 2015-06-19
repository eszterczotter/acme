<?php

namespace unit\Acme\Application\Http\Middleware;

use Acme\Support\Http\Router\Router;
use Psr\Http\Message\ResponseInterface as Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ServerRequestInterface as Request;

class DispatchRouteSpec extends ObjectBehavior
{
    function let(Router $router)
    {
        $this->beConstructedWith($router);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(\Acme\Support\Http\Kernel\Middleware::class);
    }

    function it_should_dispatch_the_route(Router $router, Request $request, Response $response)
    {
        $next = function($request, $response) {return $response; };

        $router->route($request, $response)->shouldBeCalled();

        $this->__invoke($request, $response, $next);
    }
}
