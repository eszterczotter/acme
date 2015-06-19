<?php

namespace Acme\Support\Http\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FastRouter implements Router
{
    /**
     * The FastRoute collector.
     *
     * @var RouteCollector
     */
    private $collection;
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * Create a new FastRouter.
     *
     * @param RouteCollector $collection
     */
    public function __construct(RouteCollector $collection)
    {
        $this->collection = $collection;
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
        $this->collection->addRoute($method, $path, $controller);
        return $this;
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
        // TODO: Implement dispatch() method.
    }
}
