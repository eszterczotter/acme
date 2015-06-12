<?php

namespace unit\Acme\Support\Http\Server;

use Acme\Support\Http\Router\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\Response\EmitterInterface;

class ZendServerSpec extends ObjectBehavior
{
    function let(Router $router, EmitterInterface $emitter, RequestInterface $request)
    {
        $this->beConstructedWith($router, $emitter, $request);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Server\Server');
    }
}
