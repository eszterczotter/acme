<?php

namespace unit\Acme\Support\Config;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NoodleConfigSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Config\NoodleConfig');
    }
}
