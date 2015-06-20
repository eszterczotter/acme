<?php

namespace unit\Acme\Support\Doctrine;

use Acme\Support\Config\Config;
use Acme\Support\Container\Container;
use Acme\Support\Container\ServiceProvider;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DoctrineServiceProviderSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->setContainer($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProvider::class);
    }

    function it_serves_the_EntityManager()
    {
        $this->services()->shouldReturn([
            EntityManagerInterface::class,
            'doctrine',
        ]);
    }

    function it_makes_new_EntityManagers(Container $container, Config $config)
    {
        $container->get('config')->willReturn($config);

        $config->get('database')->willReturn([
            'entities' => [],
            'connection' => [
                'driver' => 'pdo_sqlite'
            ],
        ]);

        $this->make()->shouldHaveType(EntityManagerInterface::class);
    }

    function it_registers_the_EntityManager(Container $container)
    {
        $this->register();

        $container->singleton(EntityManagerInterface::class, [$this, 'make'])->shouldHaveBeenCalled();

        $container->alias('doctrine', EntityManagerInterface::class)->shouldHaveBeenCalled();
    }
}
