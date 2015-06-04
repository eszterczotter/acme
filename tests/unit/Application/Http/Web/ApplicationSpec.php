<?php

namespace unit\Acme\Application\Http\Web;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Contract\Application');
        $this->shouldHaveType('Acme\Application\Http\Application');
    }
}
