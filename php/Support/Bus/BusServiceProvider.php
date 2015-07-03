<?php

namespace Acme\Support\Bus;

use Acme\Support\Container\ServiceProvider;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;

class BusServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Bus::class, [$this, 'make']);

        $this->container->alias('bus', Bus::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Bus::class,
            'bus',
        ];
    }

    public function make()
    {
        $handleCommands = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new NameBasedHandlerLocator($this->container),
            new InvokeInflector()
        );

        $validateCommands = new CommandValidatorMiddleware($this->container);

        return new LeagueBus(new CommandBus([
            $validateCommands,
            $handleCommands,
        ]));
    }
}
