<?php

namespace unit\Acme\Support\Debug;

use Acme\Support\Container\Container;
use Acme\Support\Debug\Handler;
use League\BooBoo\Runner;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BooBooDebugSpec extends ObjectBehavior
{
    function let(Container $container, Runner $booboo)
    {
        $this->beConstructedWith($container, $booboo);
    }

    function it_is_initializable(Runner $booboo)
    {
        $this->shouldHaveType('Acme\Support\Debug\Debug');
        $this->shouldHaveType('League\BooBoo\Handler\HandlerInterface');
        $booboo->pushHandler($this)->shouldHaveBeenCalled();
        $booboo->treatErrorsAsExceptions(true)->shouldHaveBeenCalled();
    }

    function it_registers_itself(Runner $booboo)
    {
        $this->register();
        $booboo->register()->shouldHaveBeenCalled();
    }

    function it_adds_an_exception_handler(
        Container $container,
        \Exception $exception,
        Handler $handler
    )
    {
        $container->get(Handler::class)->willReturn($handler);

        $this->handler(\Exception::class, Handler::class);
        $this->handle($exception);

        $handler->handle($exception)->shouldHaveBeenCalled();
    }
}
