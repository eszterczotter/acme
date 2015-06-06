<?php

namespace Acme\Support\Container;

abstract class ServiceProvider
{

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
}
