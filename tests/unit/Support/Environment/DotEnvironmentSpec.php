<?php

namespace unit\Acme\Support\Environment;

use Dotenv\Dotenv;
use Dotenv\Validator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DotEnvironmentSpec extends ObjectBehavior
{
    function let(Dotenv $env)
    {
        $this->beConstructedWith($env);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Environment\Environment');
    }

    function it_loads_the_environment(Dotenv $env)
    {
        $env->load()->shouldBeCalled();
        $this->load();
    }

    function it_overloads_the_environment(Dotenv $env)
    {
        $env->overload()->shouldBeCalled();
        $this->overload();
    }

    function it_requires_a_variable(Dotenv $env)
    {
        $variable = "FOO";
        $env->required($variable)->shouldBeCalled();
        $this->required($variable);
    }

    function it_sets_possible_options(Dotenv $env, Validator $validator)
    {
        $variable = "FOO";
        $options = [];
        $env->required($variable)->willReturn($validator);
        $validator->allowedValues($options)->shouldBeCalled();
        $this->required($variable, $options);
    }

    function it_gets_an_environment_variable()
    {
        putenv("FOO=BAR");
        $this->get('FOO')->shouldReturn('BAR');
    }
}
