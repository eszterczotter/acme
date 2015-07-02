<?php

namespace Acme\Support\Event;

use Acme\Support\Container\Container;
use League\Event\Emitter;

class LeagueEvent implements Event
{
    private $listeners = [];

    /**
     * @var Emitter
     */
    private $emitter;
    /**
     * @var Container
     */
    private $container;

    public function __construct(Emitter $emitter, Container $container)
    {
        $emitter->addListener('*', [$this, 'handle']);
        $this->emitter = $emitter;
        $this->container = $container;
    }

    /**
     * @inheritdoc
     */
    public function listen($event, $handler)
    {
        $this->listeners = array_merge_recursive(
            $this->listeners,
            [$event => (array) $handler]
        );
    }

    /**
     * @inheritdoc
     */
    public function listeners($event)
    {
        return $this->listeners[$event];
    }

    /**
     * @inheritdoc
     */
    public function fire($event)
    {
        $this->emitter->emit(new Wrapper($event));
    }

    public function handle(Wrapper $wrapper)
    {
        $event = $wrapper->event;
        $listeners = $this->listeners(get_class($event));

        foreach ($listeners as $listener) {
            $this->container->get($listener);
            $listener($event);
        }
    }
}
