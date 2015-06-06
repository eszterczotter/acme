<?php

namespace unit\Acme\Support\Console;

use League\CLImate\CLImate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueInputSpec extends ObjectBehavior
{
    function let(CLImate $climate)
    {
        $this->beConstructedWith($climate);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Input');
    }
}
