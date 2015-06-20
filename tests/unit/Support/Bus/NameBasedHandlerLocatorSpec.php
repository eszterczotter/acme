<?php

namespace unit\Acme\Support\Bus;

use Acme\Support\Container\Container;
use League\Tactician\Handler\Locator\HandlerLocator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameBasedHandlerLocatorSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->beConstructedWith($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HandlerLocator::class);
    }

    function it_gets_the_handler_for_a_command(Container $container, \stdClass $handler)
    {
        $container->get('Handlers\AddTaskHandler')->willReturn($handler);
        $this->getHandlerForCommand('AddTaskCommand')->shouldReturn($handler);
    }
}
