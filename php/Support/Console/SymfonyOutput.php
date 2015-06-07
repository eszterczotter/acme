<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SymfonyOutput implements Output
{
    /**
     * The Symfony Input interface.
     *
     * @var InputInterface
     */
    private $input;

    /**
     * The Symfony Output interface.
     *
     * @var OutputInterface
     */
    private $output;

    /**
     * Create new Symfony Output.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * Output error.
     *
     * @param string $text
     * @return Output
     */
    public function error($text)
    {
        $this->output->writeln("<error>" . $text . "</error>");
    }

    /**
     * Output comment.
     *
     * @param string $text
     * @return Output
     */
    public function comment($text)
    {
        $this->output->writeln("<comment>" . $text . "</comment>");
    }

    /**
     * Output information.
     *
     * @param string $text
     * @return Output
     */
    public function info($text)
    {
        $this->output->writeln("<info>" . $text . "</info>");
    }

    /**
     * Output table.
     *
     * @param string $data
     * @return Output
     */
    public function table($data)
    {
        // TODO: Implement table() method.
    }

    /**
     * Output json.
     *
     * @param string $data
     * @return Output
     */
    public function json($data)
    {
        // TODO: Implement json() method.
    }

    /**
     * Output columns.
     *
     * @param string $data
     * @return Output
     */
    public function columns($data)
    {
        // TODO: Implement columns() method.
    }

    /**
     * Output horizontal line.
     *
     * @param string $pattern
     * @param integer $length
     * @return Output
     */
    public function hr($pattern, $length)
    {
        // TODO: Implement hr() method.
    }

    /**
     * Output table.
     *
     * @param string $bar
     * @param integer $progress
     * @return Output
     */
    public function progress($bar, $progress)
    {
        // TODO: Implement progress() method.
    }

    /**
     * Output variable
     *
     * @param mixed $variable
     * @return Output
     */
    public function dump($variable)
    {
        // TODO: Implement dump() method.
    }

    /**
     * Output line break.
     *
     * @return Output
     */
    public function br()
    {
        // TODO: Implement br() method.
    }

    /**
     * Output tabulator.
     *
     * @return Output
     */
    public function tab()
    {
        // TODO: Implement tab() method.
    }

    /**
     * Clear output.
     *
     * @return Output
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }
}
