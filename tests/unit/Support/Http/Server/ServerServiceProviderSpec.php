<?php

namespace unit\Acme\Support\Http\Server;

use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Acme\Support\Http\Server\Server;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServerServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_the_server()
    {
        $this->services()->shouldReturn([
            Server::class,
            'server',
        ]);
    }

    function it_registers_the_server(Container $container)
    {
        $this->register();

        $container->singleton(Server::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('server', Server::class)->shouldHaveBeenCalled();
    }

    function it_makes_a_new_Server()
    {
        $this->make()->shouldHaveType(Server::class);
    }
}
