<?php

namespace unit\Acme\Support\Container;

use Acme\Support\Container\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('instance', []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Contract\Container');
    }

    function it_is_a_singleton()
    {
        $this->instance()->shouldBe($this);
    }

    function it_gets_itself()
    {
        $this->get('container')->shouldBe($this);
    }

    function it_gets_back_what_we_add()
    {
        $this->add('something', 5);
        $this->get('something')->shouldBe(5);
    }

    function it_gets_back_singletons()
    {
        $this->singleton('something', function(){ return rand(1,1000); });

        $this->get('something')->shouldBe($this->get('something'));
    }
}
