<?php

namespace unit\Acme\Support\Http\Router;

use Acme\Support\Container\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DispatchStrategySpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->beConstructedWith($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Route\Strategy\StrategyInterface');
    }
}
