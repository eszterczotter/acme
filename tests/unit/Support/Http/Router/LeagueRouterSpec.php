<?php

namespace unit\Acme\Support\Http\Router;

use League\Route\Dispatcher;
use League\Route\RouteCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;

class LeagueRouterSpec extends ObjectBehavior
{
    function let(RouteCollection $route)
    {
        $this->beConstructedWith($route);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Router\Router');
    }

    function it_adds_a_route(RouteCollection $route)
    {
        $verb = 'GET';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->route($verb, $path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_dispatches_a_route(RouteCollection $route, Dispatcher $dispatcher, ServerRequestInterface $request, ResponseInterface $response, UriInterface $uri)
    {
        $verb = 'GET';
        $path = '/';
        $route->getDispatcher()->willReturn($dispatcher);
        $request->getMethod()->willReturn($verb);
        $request->getUri()->willReturn($uri);
        $uri->getPath()->willReturn($path);

        $this->dispatch($request, $response);

        $dispatcher->dispatch($verb, $path)->shouldHaveBeenCalled();
    }
}
