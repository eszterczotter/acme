<?php

namespace unit\Acme\Support\Bus;

use League\Tactician\CommandBus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;

class LeagueBusSpec extends ObjectBehavior
{
    function let(CommandBus $bus)
    {
        $this->beConstructedWith($bus);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Bus\Bus');
    }

    function it_executes_a_command(CommandBus $bus, stdClass $command)
    {
        $this->execute($command);

        $bus->handle($command)->shouldHaveBeenCalled();
    }
}
