<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
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
     * The progress bars.
     *
     * @var ProgressBar[]
     */
    private $bars;

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
        $table = new Table($this->output);
        $table->setHeaders(array_shift($data));
        $table->setRows($data);
        $table->render();
    }

    /**
     * Output json.
     *
     * @param string $data
     * @return Output
     */
    public function json($data)
    {
        $this->output->writeln(json_encode($data, JSON_PRETTY_PRINT));
    }

    /**
     * Output horizontal line.
     *
     * @param string $pattern
     * @param integer $times
     * @return Output
     */
    public function hr($pattern, $times)
    {
        $this->output->writeln(str_repeat($pattern, $times));
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
        if (! array_key_exists($bar, $this->bars)) {
            $this->bars[$bar] = new ProgressBar($this->output, 100);
        }

        $this->bars[$bar]->setProgress($progress);
    }

    /**
     * Output variable
     *
     * @param mixed $variable
     * @return Output
     */
    public function dump($variable)
    {
        ob_start();

        var_dump($variable);

        $dump = ob_get_contents();

        ob_end_clean();

        $this->output->writeln($dump);
    }

    /**
     * Output line break.
     *
     * @return Output
     */
    public function br()
    {
        $this->output->writeln('');
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
}
