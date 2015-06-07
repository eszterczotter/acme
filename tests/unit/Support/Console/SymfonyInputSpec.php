<?php

namespace unit\Acme\Support\Console;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Input\InputInterface;

class SymfonyInputSpec extends ObjectBehavior
{
    function let(InputInterface $input)
    {
        $this->beConstructedWith($input);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Input');
    }

    function it_gets_all_arguments(InputInterface $input)
    {
        $arguments = ['arguments'];
        $options = ['options'];
        $input->getArguments()->willReturn($arguments)->shouldBeCalled();
        $input->getOptions()->willReturn($options)->shouldBeCalled();
        $this->arguments()->shouldBe(['options', 'arguments']);
    }

}
