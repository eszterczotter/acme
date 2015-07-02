<?php

namespace unit\Acme\Support\Event;

use League\Event\EventInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WrapperSpec extends ObjectBehavior
{
    function let()
    {
        $event = new \stdClass();
        $this->beConstructedWith($event);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EventInterface::class);
    }
}
