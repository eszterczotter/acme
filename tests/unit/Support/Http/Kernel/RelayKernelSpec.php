<?php

namespace unit\Acme\Support\Http\Kernel;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RelayKernelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Kernel\Kernel');
    }
}
