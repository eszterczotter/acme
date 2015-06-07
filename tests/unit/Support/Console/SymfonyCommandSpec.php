<?php

namespace unit\Acme\Support\Console;

use Acme\Support\Console\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SymfonyCommandSpec extends ObjectBehavior
{
    function let(Command $command)
    {
        $this->beConstructedWith($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Symfony\Component\Console\Command\Command');
    }

    function it_configures_itself(Command $command)
    {
        $command->name()->willReturn('command')->shouldBeCalled();
        $command->description()->shouldBeCalled();
        $command->arguments()->willReturn([])->shouldBeCalled();
        $this->configure();
    }
}
