<?php

namespace Acme\Support\Http\Kernel;

use Acme\Support\Container\ServiceProvider;
use Relay\Relay;

class KernelServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Kernel::class, function () {

            $config = $this->container->get('config');

            $middleware = $config->get('middleware');

            $relay = new Relay($middleware, function ($middleware) {
                return $this->container->get($middleware);
            });

            return new RelayKernel($relay);
        });

        $this->container->alias('kernel', Kernel::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Kernel::class,
            'kernel'
        ];
    }
}
