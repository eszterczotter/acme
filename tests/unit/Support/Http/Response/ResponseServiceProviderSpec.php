<?php

namespace unit\Acme\Support\Http\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponseServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\ServiceProvider');
    }
}
