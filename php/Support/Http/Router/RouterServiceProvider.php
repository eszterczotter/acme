<?php

namespace Acme\Support\Http\Router;

use Acme\Support\Container\ServiceProvider;
use FastRoute\RouteCollector;
use League\Route\RouteCollection;

class RouterServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Router::class, [$this, 'make']);

        $this->container->alias('router', Router::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Router::class,
            'router',
        ];
    }

    public function make()
    {
        $dispatcher = \FastRoute\simpleDispatcher([$this, 'collect']);
        return new FastRouter($this->container, $dispatcher);
    }

    public function collect(RouteCollector $router)
    {
        $config = $this->container->get('config');

        $routes = $config->get('routes');

        foreach ($routes as $path => $methods) {
            foreach ($methods as $method => $handler) {
                $router->addRoute($method, $path, $handler);
            }
        }
    }
}
