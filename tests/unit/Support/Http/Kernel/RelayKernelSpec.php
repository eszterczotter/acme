<?php

namespace unit\Acme\Support\Http\Kernel;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Relay\Relay;

class RelayKernelSpec extends ObjectBehavior
{
    function let(Relay $relay)
    {
        $this->beConstructedWith($relay);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Kernel\Kernel');
    }
}
