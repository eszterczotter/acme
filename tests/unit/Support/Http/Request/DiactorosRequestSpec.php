<?php

namespace unit\Acme\Support\Http\Request;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Zend\Diactoros\ServerRequest;

class DiactorosRequestSpec extends ObjectBehavior
{
    function let(ServerRequest $request)
    {
        $request->getServerParams()->willReturn([]);
        $request->getUploadedFiles()->willReturn([]);
        $this->beConstructedWith($request);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Http\Request\Request');
        $this->shouldHaveType('Zend\Diactoros\ServerRequest');
    }
}
