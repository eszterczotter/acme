<?php

namespace Acme\Support\Console;

interface Output
{
    /**
     * Output error.
     *
     * @param string $text
     * @return Output
     */
    public function error($text);

    /**
     * Output comment.
     *
     * @param string $text
     * @return Output
     */
    public function comment($text);

    /**
     * Output information.
     *
     * @param string $text
     * @return Output
     */
    public function info($text);

    /**
     * Output table.
     *
     * @param string $data
     * @return Output
     */
    public function table($data);


    /**
     * Output json.
     *
     * @param string $data
     * @return Output
     */
    public function json($data);

    /**
     * Output columns.
     *
     * @param string $data
     * @return Output
     */
    public function columns($data);


    /**
     * Output horizontal line.
     *
     * @param string $pattern
     * @param integer $length
     * @return Output
     */
    public function hr($pattern, $length);

    /**
     * Output table.
     *
     * @param string $bar
     * @param integer $progress
     * @return Output
     */
    public function progress($bar, $progress);

    /**
     * Output variable
     *
     * @param mixed $variable
     * @return Output
     */
    public function dump($variable);

    /**
     * Output line break.
     *
     * @return Output
     */
    public function br();

    /**
     * Output tabulator.
     *
     * @return Output
     */
    public function tab();

    /**
     * Clear output.
     *
     * @return Output
     */
    public function clear();
}
