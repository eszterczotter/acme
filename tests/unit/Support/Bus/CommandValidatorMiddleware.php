<?php

namespace unit\Acme\Support\Bus;

use League\Tactician\Middleware;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommandValidatorMiddleware extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Middleware::class);
    }
}
