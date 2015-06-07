<?php

namespace unit\Acme\Support\Console;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SymfonyOutputSpec extends ObjectBehavior
{
    function let(InputInterface $input, OutputInterface $output)
    {
        $this->beConstructedWith($input, $output);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Console\Output');
    }

    function it_writes_errors(OutputInterface $output)
    {
        $text = 'Ooops.';
        $output->writeln("<error>" . $text . "</error>")->shouldBeCalled();
        $this->error($text);
    }

    function it_writes_info(OutputInterface $output)
    {
        $text = 'Done.';
        $output->writeln("<info>" . $text . "</info>")->shouldBeCalled();
        $this->info($text);
    }

    function it_writes_comment(OutputInterface $output)
    {
        $text = 'Hm.';
        $output->writeln("<comment>" . $text . "</comment>")->shouldBeCalled();
        $this->comment($text);
    }

    function it_writes_json(OutputInterface $output)
    {
        $data = ['what', 'will', 'this', 'become'];
        $output->writeln(json_encode($data, JSON_PRETTY_PRINT))->shouldBeCalled();
        $this->json($data);
    }

    function it_writes_a_horizontal_line(OutputInterface $output)
    {
        $pattern = '-=';
        $times = 50;
        $output->writeln(str_repeat($pattern, $times))->shouldBeCalled();
        $this->hr($pattern, $times);
    }

    function it_writes_a_newline(OutputInterface $output)
    {
        $output->writeln('')->shouldBeCalled();
        $this->br();
    }
}
