<?php

namespace unit\Acme\Support\Http\View;

use Acme\Application\Contract\Application;
use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Acme\Support\Http\View\View;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ViewServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_a_View()
    {
        $this->services()->shouldReturn([
            View::class,
            'view',
        ]);
    }

    function it_registers_the_View(Container $container)
    {
        $this->register();

        $container->singleton(View::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('view', View::class)->shouldHaveBeenCalled();
    }

    function it_makes_a_new_View(Container $container, Application $app)
    {
        $container->get('app')->willReturn($app);
        $app->templatePath()->willReturn('/');

        $this->make()->shouldHaveType(View::class);
    }
}
