<?php

namespace Acme\Support\Bus;

use Acme\Support\Container\ServiceProvider;
use League\Tactician\CommandBus;

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
        return new LeagueBus(new CommandBus([]));
    }
}
