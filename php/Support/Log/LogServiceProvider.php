<?php

namespace Acme\Support\Log;

use Acme\Support\Container\ServiceProvider;
use Carbon\Carbon;
use Monolog\ErrorHandler;
use Monolog\Handler\PsrHandler;
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
        $this->container->singleton(Log::class, function () {
            $monolog = new Logger("log");

            $monolog->pushHandler(new StreamHandler($this->logFile()));

            return new MonoLogger($monolog);
        });

        $this->container->alias('log', Log::class);

        $this->container->alias(LoggerInterface::class, Log::class);
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
            Log::class,
            'log',
        ];
    }

    private function logFile()
    {
        $app = $this->container->get('app');
        return $app->logPath() . '/' . Carbon::now()->format("Y-m-d") . '.log';
    }
}
