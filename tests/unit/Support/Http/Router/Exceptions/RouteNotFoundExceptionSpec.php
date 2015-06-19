<?php

namespace unit\Acme\Support\Http\Router\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Router\Exceptions\RouteNotFoundException');
        $this->shouldHaveType('\Exception');
    }
}
