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

    function it_adds_a_GET_route(RouteCollection $route)
    {
        $verb = 'GET';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->get($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_POST_route(RouteCollection $route)
    {
        $verb = 'POST';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->post($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_PUT_route(RouteCollection $route)
    {
        $verb = 'PUT';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->put($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_PATCH_route(RouteCollection $route)
    {
        $verb = 'PATCH';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->patch($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_DELETE_route(RouteCollection $route)
    {
        $verb = 'DELETE';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->delete($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_HEAD_route(RouteCollection $route)
    {
        $verb = 'HEAD';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->head($path, [$controller, $action]);
        $route->addRoute($verb, $path, $controller . '::' . $action)->shouldHaveBeenCalled();
    }

    function it_adds_a_OPTIONS_route(RouteCollection $route)
    {
        $verb = 'OPTIONS';
        $path = '/';
        $controller = 'Acme\Controller';
        $action = 'action';
        $this->options($path, [$controller, $action]);
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
