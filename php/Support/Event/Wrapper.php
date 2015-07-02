<?php

namespace Acme\Support\Event;

use League\Event\AbstractEvent;
use League\Event\EventInterface;

class Wrapper extends AbstractEvent implements EventInterface
{
    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }
}
