<?php

namespace Acme\Support\Event;

use Acme\Support\Container\ServiceProvider;
use League\Event\Emitter;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Event::class, [$this, 'make']);
        $this->container->alias('event', Event::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Event::class,
            'event',
        ];
    }

    public function make()
    {
        $event = new LeagueEvent(new Emitter(), $this->container);

        $config = $this->container->get('config');

        $events = $config->get('events');

        foreach ($events as $name => $listener) {
            $event->listen($name, $listener);
        }

        return $event;
    }
}
