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
     * Route based on the request and response.
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

        return $this->dispatch($request, $response, $route);
    }

    /**
     * Dispatch the route.
     *
     * @param Request $request
     * @param Response $response
     * @param array $route
     * @return Response
     * @throws MethodNotAllowedException
     * @throws RouteNotFoundException
     */
    private function dispatch(Request $request, Response $response, $route)
    {
        if ($route[0] == Dispatcher::NOT_FOUND) {
            throw new RouteNotFoundException();
        }

        if ($route[0] == Dispatcher::METHOD_NOT_ALLOWED) {
            throw new MethodNotAllowedException();
        }

        return $this->marshall($request, $response, $route);
    }

    /**
     * Marshall the controller.
     *
     * @param Request $request
     * @param Response $response
     * @param array $route
     * @return Response
     */
    private function marshall(Request $request, Response $response, $route)
    {
        list($controller, $action, $args) = $this->extract($route);
        $controller = $this->container->get($controller);
        $controller->setRequest($request);
        $controller->setResponse($response);
        return $this->container->call([$controller, $action], $args);
    }

    /**
     * Extract the route.
     *
     * @param array $route
     * @return array
     */
    private function extract($route)
    {
        $handler = $route[1];
        $controller = $handler[0];
        $action = $handler[1];
        $args = $route[2];
        return array($controller, $action, $args);
    }
}
