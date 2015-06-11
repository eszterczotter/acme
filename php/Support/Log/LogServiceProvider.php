<?php

namespace Acme\Support\Log;

use Acme\Support\Container\ServiceProvider;
use Carbon\Carbon;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(LoggerInterface::class, function () {
            $monolog = new Logger("log");

            $monolog->pushHandler(new StreamHandler($this->logFile()));

            return $monolog;
        });

        $this->container->alias('log', LoggerInterface::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            LoggerInterface::class,
            'log',
        ];
    }

    private function logFile()
    {
        $app = $this->container->get('app');
        return $app->logPath() . '/' . Carbon::now()->format("Y-m-d") . '.log';
    }
}
