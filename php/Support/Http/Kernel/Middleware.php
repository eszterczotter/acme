<?php

namespace Acme\Support\Http\Kernel;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface Middleware
{
    public function __invoke(Request $request, Response $response, callable $next);
}
