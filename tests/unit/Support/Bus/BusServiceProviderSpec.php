<?php

namespace unit\Acme\Support\Bus;

use Acme\Support\Bus\Bus;
use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BusServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_a_Bus()
    {
        $this->services()->shouldReturn([
            Bus::class,
            'bus',
        ]);
    }

    function it_makes_new_Buses()
    {
        $this->make()->shouldHaveType(Bus::class);
    }

    function it_registers_the_Bus(Container $container)
    {
        $this->register();

        $container->singleton(Bus::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('bus', Bus::class)->shouldHaveBeenCalled();
    }
}
