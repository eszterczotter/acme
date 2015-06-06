<?php

namespace Acme\Support\Container;

abstract class ServiceProvider
{

    /**
     * Register the services of this provider.
     *
     * @param Container $container
     * @return void
     */
    abstract public function register(Container $container);

    /**
     * The services of this provider.
     *
     * @return array
     */
    abstract public function services();
}
