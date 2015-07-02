<?php

namespace unit\Acme\Support\Validation;

use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Acme\Support\Validation\Validation;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidationServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_the_Validation()
    {
        $this->services()->shouldBe([
            Validation::class,
            'validation',
        ]);
    }

    function it_makes_Validations()
    {
        $this->make()->shouldHaveType(Validation::class);
    }

    function it_registers_a_Validation(Container $container)
    {
        $this->register();

        $container->singleton(Validation::class, [$this, 'make'])->shouldHaveBeenCalled();
        $container->alias('validation', Validation::class)->shouldHaveBeenCalled();
    }
}
