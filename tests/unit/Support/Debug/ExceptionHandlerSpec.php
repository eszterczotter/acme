<?php

namespace unit\Acme\Support\Debug;

use Acme\Support\Container\Container;
use League\BooBoo\Handler\LogHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExceptionHandlerSpec extends ObjectBehavior
{
    function let(Container $container, LogHandler $logHandler)
    {
        $this->beConstructedWith($container, $logHandler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Debug\ExceptionHandler');
        $this->shouldHaveType('League\BooBoo\Handler\HandlerInterface');
    }
}
