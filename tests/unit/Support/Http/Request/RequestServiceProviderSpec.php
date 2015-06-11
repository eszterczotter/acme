<?php

namespace unit\Acme\Support\Http\Request;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
