<?php

namespace Acme\Support\Debug;

use Acme\Support\Container\ServiceProvider;
use League\BooBoo\Formatter\NullFormatter;
use League\BooBoo\Handler\LogHandler;
use League\BooBoo\Runner;

class DebugServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Debug::class, function () {

            $booboo = new Runner();
            $booboo->treatErrorsAsExceptions(true);
            $booboo->pushFormatter(new NullFormatter());

            $log = new LogHandler($this->container->get('log'));

            return new BooBooDebug($this->container, $booboo, $log);
        });

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
