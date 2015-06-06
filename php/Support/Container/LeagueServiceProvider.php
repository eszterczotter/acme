<?php

namespace Acme\Support\Container;

use League\Container\ServiceProvider as LServiceProvider;

class LeagueServiceProvider extends LServiceProvider
{
    /**
     * Our service provider
     *
     * @var ServiceProvider
     */
    private $provider;

    protected $provides;

    public function __construct(ServiceProvider $provider)
    {
        $this->provider = $provider;
        $this->provides = $provider->services();
    }

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $this->provider->register();
    }
}
