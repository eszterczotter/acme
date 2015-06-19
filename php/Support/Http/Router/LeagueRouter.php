<?php

namespace Acme\Support\Http\Router;

use League\Route\RouteCollection;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LeagueRouter implements Router
{
    /**
     * The League Route Collection.
     *
     * @var RouteCollection
     */
    private $route;

    public function __construct(RouteCollection $route)
    {
        $this->route = $route;
    }

    /**
     * Add a new route.
     *
     * @param string $method
     * @param string $path
     * @param array $controller
     * @return mixed
     */
    public function route($method, $path, array $controller)
    {
        $this->route->addRoute($method, $path, $controller[0] . '::' . $controller[1]);
    }

    /**
     * Dispatch to the given route.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function dispatch(Request $request, Response $response)
    {
        $dispatcher = $this->route->getDispatcher();
        $uri = $request->getUri();
        return $dispatcher->dispatch($request->getMethod(), $uri->getPath());
    }
}
