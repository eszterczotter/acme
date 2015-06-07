<?php

namespace unit\Acme\Support\Environment;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DotEnvironmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Environment\DotEnvEnvironment');
    }
}
