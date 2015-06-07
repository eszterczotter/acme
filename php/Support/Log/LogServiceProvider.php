<?php

namespace Acme\Support\Log;

use Acme\Support\Container\ServiceProvider;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->container->get('app');
        $this->container->singleton(Log::class, function () use ($app) {
            $monolog = new Logger("log");

            $monolog->pushHandler(new StreamHandler($app->logPath()));

            return new MonoLogger($monolog);
        });

        $this->container->alias('log', Log::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Log::class,
            'log',
        ];
    }
}
