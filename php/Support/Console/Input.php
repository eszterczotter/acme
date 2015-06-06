<?php

namespace Acme\Support\Console;

interface Input
{

    /**
     * Get the script arguments.
     *
     * @return array
     */
    public function arguments();

    /**
     * Get an argument.
     * @param string $name
     * @return string
     */
    public function argument($name);

    /**
     * Get input from user.
     *
     * @param string $question
     * @param string|null $default
     * @return string
     */
    public function input($question, $default = null);

    /**
     * Get yes or no from user.
     *
     * @param string $question
     * @return boolean
     */
    public function confirm($question);

    /**
     * Get password from user.
     *
     * @param string $question
     * @return string
     */
    public function password($question);

    /**
     * Get multiple selection from user.
     *
     * @param string $question
     * @param array $options
     * @return array
     */
    public function select($question, $options);

    /**
     * Get single selection from user.
     *
     * @param string $question
     * @param array $options
     * @return string
     */
    public function choose($question, $options);
}
