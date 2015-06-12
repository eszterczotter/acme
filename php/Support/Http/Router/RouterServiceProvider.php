<?php

namespace Acme\Support\Http\Router;

use Acme\Support\Container\ServiceProvider;
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
        $this->container->singleton(Router::class, function () {
            $strategy = new DispatchStrategy($this->container);
            $leageRoute = new RouteCollection($strategy);
            return new LeagueRouter($leageRoute);
        });

        $this->container->alias('router', Router::class);

        $this->container->inflector(Router::class, [$this, 'configure']);
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

    public function configure(Router $router)
    {
        $config = $this->container->get('config');

        $routes = $config->get('routes');

        foreach ($routes as $path => $controllers) {
            foreach ($controllers as $verb => $controller) {
                $router->route($verb, $path, $controller);
            }
        }
    }
}
