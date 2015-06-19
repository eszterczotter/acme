<?php

namespace unit\Acme\Support\Http\Router\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodNotAllowedExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Router\Exceptions\MethodNotAllowedException');
        $this->shouldHaveType('\Exception');
    }
}
