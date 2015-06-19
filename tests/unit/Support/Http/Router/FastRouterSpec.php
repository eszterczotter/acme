<?php

namespace unit\Acme\Support\Http\Router;

use Acme\Support\Container\Container;
use Acme\Support\Http\Router\Router;
use FastRoute\Dispatcher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FastRouterSpec extends ObjectBehavior
{
    function let(Container $container, Dispatcher $dispatcher)
    {
        $this->beConstructedWith($container, $dispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Router::class);
    }
}
