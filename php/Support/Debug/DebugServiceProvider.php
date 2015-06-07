<?php

namespace Acme\Support\Debug;

use Acme\Support\Container\ServiceProvider;

class DebugServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Debug::class, BooBooDebug::class);
        $this->container->alias('debug', Debug::class);
        $this->container->inflector(Debug::class, [$this, 'configure']);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Debug::class,
            'debug'
        ];
    }

    public function configure(Debug $debug)
    {
        $app = $this->container->get('app');

        $exceptions = require $app->configPath() . '/exceptions.php';

        foreach ($exceptions['exceptions'] as $exception => $handlers) {
            foreach ((array) $handlers as $handler) {
                $debug->handler($exception, $handler);
            }
        }
    }
}
