<?php

namespace Acme\Support\Bus;

use League\Tactician\Middleware;

class CommandValidatorMiddleware implements Middleware
{
    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        return $next($command);
    }
}
