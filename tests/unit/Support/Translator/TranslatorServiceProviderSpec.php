<?php

namespace unit\Acme\Support\Translator;

use Acme\Application\Application;
use Acme\Support\Config\Config;
use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Acme\Support\Translator\Translator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TranslatorServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_translators()
    {
        $this->services()->shouldReturn([
            Translator::class,
            'translator',
        ]);
    }

    function it_makes_a_translator(Container $container, Application $app, Config $config)
    {
        $container->get('app')->willReturn($app);
        $container->get('config')->willReturn($config);
        $app->localePath()->willReturn(__DIR__);
        $this->make()->shouldHaveType(Translator::class);
    }

    function it_registers_the_translator(Container $container)
    {

        $this->register();

        $container->singleton(Translator::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('translator', Translator::class)->shouldHaveBeenCalled();
    }
}
