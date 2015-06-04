<?php

namespace unit\Acme\Support\Container;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('instance', []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Contract\Container');
    }

    function it_is_a_singleton()
    {
        $this->instance()->shouldBe($this);
    }
}
