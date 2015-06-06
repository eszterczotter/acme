<?php

namespace unit\Acme\Support\Container;

use Acme\Support\Container\ServiceProvider;
use League\Container\ContainerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueServiceProviderSpec extends ObjectBehavior
{
    function let(ServiceProvider $provider, ContainerInterface $leagueContainer)
    {
        $this->beConstructedWith($provider, $leagueContainer);
    }

    function it_is_initializable(ServiceProvider $provider)
    {
        $provider->services()->shouldBeCalled();
        $this->shouldHaveType('League\Container\ServiceProvider');
    }

    function it_registers_our_service_provider(
        ServiceProvider $provider, ContainerInterface $leagueContainer)
    {
        $leagueContainer->call([$provider, 'register'])->shouldBeCalled();
        $provider->services()->shouldBeCalled();
        $this->register();
    }
}
