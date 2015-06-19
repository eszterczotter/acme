<?php

namespace unit\Acme\Support\Http\Server;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\EmitterInterface;

class ZendServerSpec extends ObjectBehavior
{
    function let(EmitterInterface $emitter)
    {
        $this->beConstructedWith($emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Server\Server');
    }

    function it_sends_a_response(EmitterInterface $emitter, Response $response)
    {
        $this->send($response)->shouldReturn($response);

        $emitter->emit($response)->shouldHaveBeenCalled();
    }
}
