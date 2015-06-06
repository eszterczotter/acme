<?php

namespace unit\Acme\Support\Config;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NoodleConfigSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Config\Config');
    }
}
