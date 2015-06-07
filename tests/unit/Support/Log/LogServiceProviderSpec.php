<?php

namespace unit\Acme\Support\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
