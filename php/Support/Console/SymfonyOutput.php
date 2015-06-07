<?php

namespace Acme\Support\Console;

class SymfonyOutput implements Output
{
    /**
     * Output error.
     *
     * @param string $text
     * @return Output
     */
    public function error($text)
    {
        // TODO: Implement error() method.
    }

    /**
     * Output comment.
     *
     * @param string $text
     * @return Output
     */
    public function comment($text)
    {
        // TODO: Implement comment() method.
    }

    /**
     * Output information.
     *
     * @param string $text
     * @return Output
     */
    public function info($text)
    {
        // TODO: Implement info() method.
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
