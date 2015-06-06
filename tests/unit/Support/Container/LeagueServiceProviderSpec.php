<?php

namespace unit\Acme\Support\Container;

use Acme\Support\Container\ServiceProvider;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueServiceProviderSpec extends ObjectBehavior
{
    function let(ServiceProvider $provider)
    {
        $this->beConstructedWith($provider);
    }

    function it_is_initializable(ServiceProvider $provider)
    {
        $provider->services()->shouldBeCalled();
        $this->shouldHaveType('League\Container\ServiceProvider');
    }

    function it_registers_our_service_provider(ServiceProvider $provider)
    {
        $provider->services()->shouldBeCalled();
        $provider->register()->shouldBeCalled();
        $this->register();
    }
}
