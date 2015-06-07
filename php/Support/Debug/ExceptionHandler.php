<?php

namespace Acme\Support\Debug;

use Acme\Support\Container\Container;
use League\BooBoo\Handler\HandlerInterface;
use League\BooBoo\Handler\LogHandler;

class ExceptionHandler implements HandlerInterface
{
    /**
     * The Container instance.
     *
     * @var Container
     */
    private $container;
    /**
     * The Booboo log handler.
     *
     * @var LogHandler
     */
    private $logHandler;

    /**
     * Create new Exception Handler.
     *
     * @param Container $container
     * @param LogHandler $logHandler
     */
    public function __construct(Container $container, LogHandler $logHandler)
    {
        $this->container = $container;
        $this->logHandler = $logHandler;
    }

    public function handle(\Exception $e)
    {
        // TODO: Implement handle() method.
    }
}
