<?php

namespace Acme\Support\Http\Router;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Router
{
    /**
     * Add a new route.
     *
     * @param string $method
     * @param string $path
     * @param array $controller
     * @return mixed
     */
    public function route($method, $path, array $controller);

    /**
     * Dispatch to the given route.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function dispatch(Request $request, Response $response);
}
