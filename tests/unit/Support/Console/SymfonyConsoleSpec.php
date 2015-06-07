<?php

namespace unit\Acme\Support\Console;

use Acme\Support\Console\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application as Console;


class SymfonyConsoleSpec extends ObjectBehavior
{
    function let(Console $console)
    {
        $this->beConstructedWith($console);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Console');
    }

    function it_adds_a_command(Command $command)
    {
        $command->name()->willReturn("command")->shouldBeCalled();
        $command->description()->willReturn("")->shouldBeCalled();
        $command->arguments()->willReturn([])->shouldBeCalled();
        $this->command($command)->shouldReturn($this);
    }

    function it_executes(Console $console)
    {
        $console->run()->shouldBeCalled();
        $this->execute();
    }

    function it_sets_the_application_name(Console $console)
    {
        $name = 'App';
        $console->setName($name)->shouldBeCalled();
        $this->name($name)->shouldReturn($this);
    }

    function it_sets_the_version_of_the_application(Console $console)
    {
        $version = '0.0.0';
        $console->setVersion($version)->shouldBeCalled();
        $this->version($version)->shouldReturn($this);
    }
}
