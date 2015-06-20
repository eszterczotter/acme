<?php

namespace Acme\Support\Bus;

use Acme\Support\Container\Container;
use League\Tactician\Exception\MissingHandlerException;
use League\Tactician\Handler\Locator\HandlerLocator;

class NameBasedHandlerLocator implements HandlerLocator
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Retrieves the handler for a specified command
     *
     * @param string $commandName
     *
     * @return object
     *
     * @throws MissingHandlerException
     */
    public function getHandlerForCommand($commandName)
    {
        $handlerName = $this->extractHandlerName($commandName);

        return $this->container->get($handlerName);
    }

    /**
     * @param $commandName
     * @return string
     */
    private function extractHandlerName($commandName)
    {
        preg_match('/^(.+?\\\\?)??(\w+)Command$/', $commandName, $match);

        $nameSpace = $match[1];
        $commandName = $match[2];

        return $nameSpace . 'Handlers\\' . $commandName . 'Handler';
    }
}
