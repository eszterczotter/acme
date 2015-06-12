<?php

namespace unit\Acme\Support\Http\Router;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouterServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
