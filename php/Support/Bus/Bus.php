<?php

namespace Acme\Support\Bus;

interface Bus
{
    /**
     * Execute the command.
     *
     * @param object $command
     * @return mixed
     */
    public function execute($command);
}
