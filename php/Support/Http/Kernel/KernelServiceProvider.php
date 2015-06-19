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
        $this->container->singleton(Kernel::class, [$this, 'make']);

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

    /**
     * Make a new Kernel.
     *
     * @return Kernel
     */
    public function make()
    {
        $config = $this->container->get('config');

        $middleware = $config->get('middleware');

        $relay = new Relay($middleware, [$this, 'resolve']);

        return new RelayKernel($relay);
    }

    /**
     * Resolve the middleware instance.
     *
     * @param string $middleware
     * @return Middleware
     */
    public function resolve($middleware)
    {
        return $this->container->get($middleware);
    }
}
