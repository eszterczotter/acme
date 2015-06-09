<?php

namespace Acme\Support\Http\Router;

interface Router
{
    /**
     * Add a GET route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function get($path, $controller);

    /**
     * Add a POST route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function post($path, $controller);

    /**
     * Add a PUT route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function put($path, $controller);

    /**
     * Add a PATCH route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function patch($path, $controller);

    /**
     * Add a DELETE route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function delete($path, $controller);

    /**
     * Add a HEAD route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function head($path, $controller);

    /**
     * Add an OPTIONS route.
     *
     * @param string $path
     * @param string $controller
     * @return Router
     */
    public function options($path, $controller);

    /**
     * Dispatch to the given route.
     *
     * @param string $verb
     * @param string $path
     * @return void
     */
    public function dispatch($verb, $path);
}
