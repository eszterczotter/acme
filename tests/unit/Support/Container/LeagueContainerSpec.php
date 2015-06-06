<?php

namespace unit\Acme\Support\Container;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;

class LeagueContainerSpec extends ObjectBehavior
{
    function it_is_initializable($alias)
    {
        $this->shouldHaveType('Acme\Support\Container\Container');
    }

    function it_gets_itself()
    {
        $this->get('container')->shouldBe($this);
        $this->get('Acme\Support\Container\Container')->shouldBe($this);
    }

    function it_adds_stuff_fluently($concrete)
    {
        $this->add('something', $concrete)->shouldBe($this);
    }

    function it_gets_what_was_added($concrete)
    {
        $alias = 'something';
        $this->add($alias, $concrete);
        $this->get($alias)->shouldReturn($concrete);
    }

    function it_allows_singletons()
    {
        $alias = 'something';
        $this->singleton($alias, function(){
            return new stdClass();
        });
        $this->get($alias)->shouldBe($this->get($alias));
    }

    function it_calls_callables()
    {
        $this->call(function(stdClass $class){
           return get_class($class);
        })->shouldReturn(stdClass::class);
    }
}
