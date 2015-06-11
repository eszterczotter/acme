<?php

namespace Acme\Support\Http\Request;

use Acme\Support\Container\ServiceProvider;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\ServerRequestFactory;

class RequestServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->add(ServerRequestInterface::class, function () {
            return ServerRequestFactory::fromGlobals();
        });

        $this->container->alias('request', ServerRequestInterface::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            ServerRequestInterface::class,
            'request',
        ];
    }
}
