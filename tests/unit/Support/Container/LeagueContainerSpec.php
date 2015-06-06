<?php

namespace unit\Acme\Support\Container;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueContainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Container\Container');
    }

    function it_gets_itself()
    {
        $this->get('container')->shouldBe($this);
    }
}
