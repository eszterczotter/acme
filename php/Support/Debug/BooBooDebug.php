<?php

namespace Acme\Support\Debug;

use Acme\Support\Container\Container;
use League\BooBoo\Handler\HandlerInterface;
use League\BooBoo\Handler\LogHandler;
use League\BooBoo\Runner;

class BooBooDebug implements Debug, HandlerInterface
{
    /**
     * Exception handlers
     *
     * @var array
     */
    private $handlers;

    /**
     * The Container instance.
     *
     * @var Container
     */
    private $container;

    /**
     * The BooBoo error runner.
     *
     * @var Runner
     */
    private $booboo;

    /**
     * @var LogHandler
     */

    private $log;

    /**
     * Create new Exception Handler.
     *
     * @param Container $container
     * @param Runner $booboo
     * @param LogHandler $log
     */
    public function __construct(Container $container, Runner $booboo, LogHandler $log)
    {
        $this->container = $container;
        $this->booboo = $booboo;
        $this->log = $log;
        $this->booboo->pushHandler($this);
        $this->booboo->treatErrorsAsExceptions(true);
    }

    /**
     * Handle the exception.
     *
     * @param \Exception $exception
     */
    public function handle(\Exception $exception)
    {
        $this->runHandlers($exception);

        $this->log->handle($exception);
    }

    /**
     * Run the debugger.
     *
     * @return void
     */
    public function register()
    {
        $this->booboo->register();
    }

    /**
     * Add a handler to the debugger.
     *
     * @param string $exception
     * @param string $handler
     * @return Debug
     */
    public function handler($exception, $handler)
    {
        $this->handlers[$exception][] = $handler;
    }
    
    private function callHandlers(\Exception $exception, $handlers)
    {
        foreach ($handlers as $handler) {
            $handler = $this->container->get($handler);
            $handler->handle($exception);
        }
    }

    private function runHandlers(\Exception $exception)
    {
        foreach ($this->handlers as $type => $handlers) {
            if (is_a($exception, $type)) {
                $this->callHandlers($exception, $handlers);
            }
        }
    }
}
