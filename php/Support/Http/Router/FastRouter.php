<?php

namespace Acme\Support\Http\Router;

use Acme\Support\Container\Container;
use Acme\Support\Http\Router\Exceptions\MethodNotAllowedException;
use Acme\Support\Http\Router\Exceptions\RouteNotFoundException;
use FastRoute\Dispatcher;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FastRouter implements Router
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * Create a new FastRouter.
     *
     * @param Container $container
     * @param Dispatcher $dispatcher
     */
    public function __construct(Container $container, Dispatcher $dispatcher)
    {
        $this->container = $container;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Dispatch to the given route.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws MethodNotAllowedException
     * @throws RouteNotFoundException
     */
    public function route(Request $request, Response $response)
    {
        $uri = $request->getUri();

        $route = $this->dispatcher->dispatch($request->getMethod(), $uri->getPath());

        switch ($route[0]) {
            case Dispatcher::NOT_FOUND:
                throw new RouteNotFoundException($request, $response);
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowed = $route[1];
                throw new MethodNotAllowedException($request, $response, $allowed);
            case Dispatcher::FOUND:
                $handler = $route[1];
                $controller = $handler[0];
                $action = $handler[1];
                $args = $route[2];
                $controller = $this->container->get($controller);
                return $this->container->call([$controller, $action], $args);
        }
    }
}
