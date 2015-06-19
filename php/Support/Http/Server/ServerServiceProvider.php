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
        $this->container->singleton(Server::class, [$this, 'make']);

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

    /**
     * Make a new Server.
     *
     * @return Server
     */
    public function make()
    {
        return new ZendServer(new SapiEmitter());
    }
}
