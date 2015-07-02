<?php

namespace unit\Acme\Support\Event;

use Acme\Support\Container\Container;
use Acme\Support\Event\Event;
use League\Event\Emitter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueEventSpec extends ObjectBehavior
{
    function let(Emitter $emitter, Container $container)
    {
        $this->beConstructedWith($emitter, $container);
    }

    function it_listens_for_all_events(Emitter $emitter)
    {
        $emitter->addListener('*', [$this, 'handle'])->shouldHaveBeenCalled();
    }

    function it_is_an_Event()
    {
        $this->shouldHaveType(Event::class);
    }

    function it_listens_for_events_with_single_handlers()
    {
        $this->listen('event', 'handler');
        $this->listen('event', 'other handler');
        $this->listeners('event')->shouldBe(['handler', 'other handler']);
    }

    function it_listens_for_events_with_multiple_handlers()
    {
        $this->listen('event', ['handler', 'other handler']);
        $this->listen('event', 'single handler');
        $this->listeners('event')->shouldBe(['handler', 'other handler', 'single handler']);
    }
}
