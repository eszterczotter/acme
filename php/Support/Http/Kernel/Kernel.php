<?php

namespace Acme\Support\Http\Kernel;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Kernel
{
    public function process(Request $request, Response $response);
}
