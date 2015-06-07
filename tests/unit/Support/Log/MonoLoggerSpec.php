<?php

namespace unit\Acme\Support\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MonoLoggerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Log\Log');
        $this->shouldHaveType('Psr\Log\LoggerInterface');
    }
}
