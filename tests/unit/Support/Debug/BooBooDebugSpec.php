<?php

namespace unit\Acme\Support\Debug;

use Acme\Support\Container\Container;
use League\BooBoo\Runner;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BooBooDebugSpec extends ObjectBehavior
{
    function let(Container $container, Runner $booboo)
    {
        $this->beConstructedWith($container, $booboo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Debug\Debug');
        $this->shouldHaveType('League\BooBoo\Handler\HandlerInterface');
    }
}
