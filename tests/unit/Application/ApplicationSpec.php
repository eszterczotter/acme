<?php

namespace unit\Acme\Application;

use Acme\Support\Container\LeagueContainer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(__DIR__);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Contract\Application');
    }

    function it_has_container()
    {
        $this->container()->shouldBe(LeagueContainer::instance());
    }

    function it_binds_itself_to_the_container_at_bootstrap()
    {
        $this->bootstrap();

        $this->container()->get('app')->shouldBe($this);
    }
}
