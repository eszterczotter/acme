<?php

namespace unit\Acme\Support\Http\Server;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServerServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
