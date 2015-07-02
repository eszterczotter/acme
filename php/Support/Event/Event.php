<?php

namespace Acme\Support\Event;

interface Event
{
    /**
     * Listen for an event.
     *
     * @param string $event
     * @param string|array $handler
     * @return self
     */
    public function listen($event, $handler);

    /**
     * The listeners for an event.
     *
     * @param string $event
     * @return array
     */
    public function listeners($event);

    /**
     * Fire an event.
     *
     * @param object $event
     * @return self
     */
    public function fire($event);
}
