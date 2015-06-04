<?php

namespace unit\Acme\Application\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Contract\Application');
        $this->shouldHaveType('Acme\Application\Application');
    }
}
