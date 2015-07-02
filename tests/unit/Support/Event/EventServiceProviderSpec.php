<?php

namespace unit\Acme\Support\Event;

use Acme\Support\Config\Config;
use Acme\Support\Container\Container;
use Acme\Support\Event\Event;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(\Acme\Support\Container\ServiceProvider::class);
    }

    function it_serves_Events()
    {
        $this->services()->shouldBe([
            Event::class,
            'event',
        ]);
    }

    function it_makes_an_Event(Container $container, Config $config)
    {
        $container->get('config')->willReturn($config);

        $config->get('events')->willReturn([]);

        $this->make()->shouldHaveType(Event::class);
    }

    function it_registers_the_Event(Container $container)
    {
        $this->register();

        $container->singleton(Event::class, [$this, 'make'])->shouldHaveBeenCalled();
        $container->alias('event', Event::class)->shouldHaveBeenCalled();
    }
}
