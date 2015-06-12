<?php

namespace Acme\Support\Http\Router;

use League\Route\Dispatcher;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;

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
     * Add a GET route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function get($path, array $controller)
    {
        $this->route('GET', $path, $controller);
    }

    /**
     * Add a POST route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function post($path, array $controller)
    {
        $this->route('POST', $path, $controller);
    }

    /**
     * Add a PUT route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function put($path, array $controller)
    {
        $this->route('PUT', $path, $controller);
    }

    /**
     * Add a PATCH route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function patch($path, array $controller)
    {
        $this->route('PATCH', $path, $controller);
    }

    /**
     * Add a DELETE route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function delete($path, array $controller)
    {
        $this->route('DELETE', $path, $controller);
    }

    /**
     * Add a HEAD route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function head($path, array $controller)
    {
        $this->route('HEAD', $path, $controller);
    }

    /**
     * Add an OPTIONS route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function options($path, array $controller)
    {
        $this->route('OPTIONS', $path, $controller);
    }

    /**
     * Add a new route.
     *
     * @param string $verb
     * @param string $path
     * @param array $controller
     * @return mixed
     */
    public function route($verb, $path, array $controller)
    {
        $this->route->addRoute($verb, $path, $controller[0] . '::' . $controller[1]);
    }

    /**
     * Dispatch to the given route.
     *
     * @param string $verb
     * @param string $path
     * @return ResponseInterface
     */
    public function dispatch($verb, $path)
    {
        return $this->route->getDispatcher()->dispatch($verb, $path);
    }
}
