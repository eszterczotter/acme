<?php

namespace unit\Acme\Application\Http;

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
        $this->shouldHaveType('Acme\Application\Application');
    }
}
