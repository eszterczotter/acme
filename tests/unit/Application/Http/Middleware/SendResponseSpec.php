<?php

namespace unit\Acme\Application\Http\Middleware;

use Acme\Support\Http\Server\Server;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SendResponseSpec extends ObjectBehavior
{
    function let(Server $server)
    {
        $this->beConstructedWith($server);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(\Acme\Support\Http\Kernel\Middleware::class);
    }

    function it_should_send_the_response(Server $server, Request $request, Response $response)
    {
        $next = function($request, $response) {
            return $response;
        };

        $server->send($response)->shouldBeCalled();

        $this->__invoke($request, $response, $next);
    }
}
