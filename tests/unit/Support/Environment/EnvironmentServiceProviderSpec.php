<?php

namespace unit\Acme\Support\Environment;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnvironmentServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Environment\EnvironmentServiceProvider');
    }
}
