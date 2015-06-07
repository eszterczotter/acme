<?php

namespace unit\Acme\Support\Debug;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DebugServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
