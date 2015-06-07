<?php

namespace unit\Acme\Support\Debug;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExceptionHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Debug\ExceptionHandler');
    }
}
