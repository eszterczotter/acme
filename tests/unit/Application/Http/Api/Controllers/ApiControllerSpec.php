<?php

namespace unit\Acme\Application\Http\Api\Controllers;

use Acme\Support\Config\Config;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Application\Http\Api\Controllers\ApiController');
    }
}
