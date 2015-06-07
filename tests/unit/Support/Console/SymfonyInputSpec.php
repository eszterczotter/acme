<?php

namespace unit\Acme\Support\Console;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SymfonyInputSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Input');
    }
}
