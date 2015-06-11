<?php

namespace Acme\Support\Http\Response;

use Acme\Support\Container\ServiceProvider;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->add(ResponseInterface::class, function () {
            return new Response();
        });

        $this->container->alias('response', ResponseInterface::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            ResponseInterface::class,
            'response',
        ];
    }
}
