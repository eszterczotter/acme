<?php

namespace unit\Acme\Application;

use Acme\Support\Container\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Contract\Application');
    }

    function it_has_container()
    {
        $this->container()->shouldBe(Container::instance());
    }
}
