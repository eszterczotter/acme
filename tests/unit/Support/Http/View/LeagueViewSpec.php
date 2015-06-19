<?php

namespace unit\Acme\Support\Http\View;

use Acme\Support\Http\View\View;
use League\Plates\Engine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeagueViewSpec extends ObjectBehavior
{
    function let(Engine $engine)
    {
        $this->beConstructedWith($engine);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(View::class);
    }

    function it_renders_a_template(Engine $engine)
    {
        $engine->render('template', [])->willReturn('html');

        $this->render('template', [])->shouldReturn('html');
    }
}
