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

    /**
     * Create a new instance.
     *
     * @param Server $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * Send the response.
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $response = $next($request, $response);

        return $this->server->send($response);
    }
}
