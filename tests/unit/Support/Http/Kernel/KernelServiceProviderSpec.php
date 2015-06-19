<?php

namespace unit\Acme\Support\Http\Kernel;

use Acme\Support\Config\Config;
use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Acme\Support\Http\Kernel\Kernel;
use Acme\Support\Http\Kernel\Middleware;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KernelServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_a_Kernel()
    {
        $this->services()->shouldReturn([
            Kernel::class,
            'kernel',
        ]);
    }

    function it_registers_the_Kernel(Container $container)
    {
        $this->register();

        $container->singleton(Kernel::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('kernel', Kernel::class)->shouldHaveBeenCalled();
    }

    function it_makes_a_new_Kernel(Container $container, Config $config)
    {
        $container->get('config')->willReturn($config);

        $config->get('middleware')->willReturn([]);

        $this->make()->shouldHaveType(Kernel::class);
    }

    function it_resolves_a_middleware(Container $container, Middleware $middleware)
    {
        $container->get('middleware')->willReturn($middleware);

        $this->resolve('middleware')->shouldReturn($middleware);
    }
}
