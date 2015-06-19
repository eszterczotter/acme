<?php

namespace Acme\Support\Http\Router;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Router
{
    /**
     * Add a GET route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function get($path, array $controller);

    /**
     * Add a POST route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function post($path, array $controller);

    /**
     * Add a PUT route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function put($path, array $controller);

    /**
     * Add a PATCH route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function patch($path, array $controller);

    /**
     * Add a DELETE route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function delete($path, array $controller);

    /**
     * Add a HEAD route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function head($path, array $controller);

    /**
     * Add an OPTIONS route.
     *
     * @param string $path
     * @param array $controller
     * @return Router
     */
    public function options($path, array $controller);

    /**
     * Add a new route.
     *
     * @param string $verb
     * @param string $path
     * @param array $controller
     * @return mixed
     */
    public function route($verb, $path, array $controller);

    /**
     * Dispatch to the given route.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function dispatch(Request $request, Response $response);
}
