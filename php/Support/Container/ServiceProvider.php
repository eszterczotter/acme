<?php

namespace Acme\Support\Container;

abstract class ServiceProvider
{

    /**
     * A Service Container
     *
     * @var Container
     */
    protected $container;

    /**
     * Register the services of this provider.
     *
     * @return void
     */
    abstract public function register();

    /**
     * The services of this provider.
     *
     * @return array
     */
    abstract public function services();

    /**
     * @param Container $container
     * @return mixed
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
