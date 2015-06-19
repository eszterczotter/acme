<?php

namespace Acme\Support\Http\Server;

use Acme\Support\Container\ServiceProvider;
use Zend\Diactoros\Response\SapiEmitter;

class ServerServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Server::class, function () {
            $router = $this->container->get('router');
            $emitter = new SapiEmitter();
            $request = $this->container->get('request');
            $response = $this->container->get('response');
            return new ZendServer($router, $emitter, $request, $response);
        });

        $this->container->alias('server', Server::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Server::class,
            'server',
        ];
    }
}