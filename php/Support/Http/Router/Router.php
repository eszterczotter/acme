<?php

namespace Acme\Support\Http\Router;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Router
{
    /**
     * Dispatch to the given route.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function route(Request $request, Response $response);
}
