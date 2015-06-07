<?php

namespace unit\Acme\Support\Log;

use Monolog\Logger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MonoLoggerSpec extends ObjectBehavior
{
    function let(Logger $logger)
    {
        $this->beConstructedWith($logger);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Log\Log');
        $this->shouldHaveType('Psr\Log\LoggerInterface');
    }
}
