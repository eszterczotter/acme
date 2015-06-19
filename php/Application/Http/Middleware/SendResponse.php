<?php

namespace Acme\Application\Http\Middleware;

use Acme\Support\Http\Kernel\Middleware;
use Acme\Support\Http\Server\Server;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SendResponse implements Middleware
{
    /**
     * @var Server
     */
    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        $response = $next($request, $response);

        $this->server->send($response);
    }
}
