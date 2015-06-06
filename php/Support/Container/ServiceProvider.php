<?php

namespace Acme\Support\Container;

interface ServiceProvider
{

    /**
     * Register the services of this provider.
     *
     * @param Container $container
     * @return void
     */
    public function register(Container $container);

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services();
}
