<?php

namespace unit\Acme\Application\Http\Exceptions\Handlers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteNotFoundHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Http\Exceptions\Handlers\RouteNotFoundHandler');
    }
}
