<?php

namespace Acme\Support\Log;

use Monolog\Logger;
use Psr\Log\LoggerTrait;

class MonoLogger implements Log
{

    use LoggerTrait;

    /**
     * The Monolog instance.
     *
     * @var Logger
     */
    private $logger;

    /**
     * Create a new MonoLogger.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $this->logger->log($level, $message, $context);
    }
}
