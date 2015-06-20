<?php

namespace Acme\Support\Bus;

use League\Tactician\CommandBus;

class LeagueBus implements Bus
{
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * Execute the command.
     *
     * @param object $command
     * @return mixed
     */
    public function execute($command)
    {
        $this->bus->handle($command);
    }
}
