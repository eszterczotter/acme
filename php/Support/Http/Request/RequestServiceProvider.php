<?php

namespace Acme\Support\Http\Request;

use Acme\Support\Container\ServiceProvider;
use Zend\Diactoros\ServerRequest;
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
        $this->container->add(Request::class, function () {
            return new DiactorosRequest(
                ServerRequestFactory::fromGlobals()
            );
        });

        $this->container->add(ServerRequest::class, function () {
            return ServerRequestFactory::fromGlobals();
        });

        $this->container->inflector(Request::class, [$this, 'validate']);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Request::class,
            'request',
        ];
    }

    public function validate(Request $request)
    {
        $request->validate();
    }
}
