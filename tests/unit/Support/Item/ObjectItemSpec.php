<?php

namespace unit\Acme\Support\Item;

use Acme\Support\Item\Item;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ObjectItemSpec extends ObjectBehavior
{
    function let(\stdClass $object)
    {
        $this->beConstructedWith($object);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Item::class);
    }
}
