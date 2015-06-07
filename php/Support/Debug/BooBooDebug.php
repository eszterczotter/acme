<?php

namespace Acme\Support\Debug;

use Acme\Support\Container\Container;
use League\BooBoo\Handler\HandlerInterface;
use League\BooBoo\Runner;

class BooBooDebug implements Debug, HandlerInterface
{
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
     * Exception handlers
     *
     * @var array
     */
    private $handlers;

    /**
     * Create new Exception Handler.
     *
     * @param Container $container
     * @param Runner $booboo
     */
    public function __construct(Container $container, Runner $booboo)
    {
        $this->container = $container;
        $this->booboo = $booboo;
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
        foreach ($this->handlers as $type => $handlers) {
            if (is_a($exception, $type)) {
                foreach ($handlers as $handler) {
                    $handler = $this->container->get($handler);
                    $handler->handle($exception);
                }
            }
        }
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
}
