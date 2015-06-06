<?php

namespace unit\Acme\Support\Config;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Config\ConfigServiceProvider');
    }
}
