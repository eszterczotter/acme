<?php

namespace Acme\Support\Console;

use League\CLImate\CLImate;

class LeagueOutput implements Output
{

    private $bars = [];

    /**
     * @var CLImate
     */
    private $climate;

    /**
     * @param CLImate $climate
     */
    public function __construct(CLImate $climate)
    {
        $this->climate = $climate;
    }

    /**
     * Output error.
     *
     * @param string $text
     * @return Output
     */
    public function error($text)
    {
        $this->climate->error($text);
        return $this;
    }

    /**
     * Output comment.
     *
     * @param string $text
     * @return Output
     */
    public function comment($text)
    {
        $this->climate->comment($text);
        return $this;
    }

    /**
     * Output information.
     *
     * @param string $text
     * @return Output
     */
    public function info($text)
    {
        $this->climate->info();
        return $this;
    }

    /**
     * Output table.
     *
     * @param string $data
     * @return Output
     */
    public function table($data)
    {
        $this->climate->table($data);
        return $this;
    }

    /**
     * Output json.
     *
     * @param string $data
     * @return Output
     */
    public function json($data)
    {
        $this->climate->json($data);
        return $this;
    }

    /**
     * Output columns.
     *
     * @param string $data
     * @return Output
     */
    public function columns($data)
    {
        $this->climate->json($data);
        return $this;
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
        $this->climate->border($pattern, $length);
        return $this;
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
        if (array_key_exists($bar, $this->bars)) {
            $this->bars[$bar]->current($progress);
        } else {
            $this->bars[$bar] = $this->climate->progress(100);
        }
        return $this;
    }

    /**
     * Output variable
     *
     * @param mixed $variable
     * @return Output
     */
    public function dump($variable)
    {
        $this->climate->dump($variable);
        return $this;
    }

    /**
     * Output line break.
     *
     * @return Output
     */
    public function br()
    {
        $this->climate->br();
        return $this;
    }

    /**
     * Output tabulator.
     *
     * @return Output
     */
    public function tab()
    {
        $this->climate->tab();
        return $this;
    }

    /**
     * Clear output.
     *
     * @return Output
     */
    public function clear()
    {
        $this->climate->clear();
        return $this;
    }
}
