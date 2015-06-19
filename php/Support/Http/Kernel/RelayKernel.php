<?php

namespace Acme\Support\Http\Kernel;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Relay\Relay;

class RelayKernel implements Kernel
{
    /**
     * The Relay instance.
     *
     * @var Relay
     */
    private $relay;

    public function __construct(Relay $relay)
    {
        $this->relay = $relay;
    }

    public function process(Request $request, Response $response)
    {
        $this->relay->__invoke($request, $response);
    }
}
