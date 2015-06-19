<?php

namespace unit\Acme\Support\Http\Server;

use Acme\Support\Http\Router\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\EmitterInterface;

class ZendServerSpec extends ObjectBehavior
{
    function let(Router $router, EmitterInterface $emitter, ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->beConstructedWith($router, $emitter, $request, $response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Server\Server');
    }
}
