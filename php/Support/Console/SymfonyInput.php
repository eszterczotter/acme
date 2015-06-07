<?php

namespace Acme\Support\Console;

class SymfonyInput implements Input
{
    /**
     * Get the script arguments.
     *
     * @return array
     */
    public function arguments()
    {
        // TODO: Implement arguments() method.
    }

    /**
     * Get an argument.
     * @param string $name
     * @return string
     */
    public function argument($name)
    {
        // TODO: Implement argument() method.
    }

    /**
     * Get input from user.
     *
     * @param string $question
     * @param string|null $default
     * @return string
     */
    public function input($question, $default = null)
    {
        // TODO: Implement input() method.
    }

    /**
     * Get yes or no from user.
     *
     * @param string $question
     * @return boolean
     */
    public function confirm($question)
    {
        // TODO: Implement confirm() method.
    }

    /**
     * Get password from user.
     *
     * @param string $question
     * @return string
     */
    public function password($question)
    {
        // TODO: Implement password() method.
    }

    /**
     * Get multiple selection from user.
     *
     * @param string $question
     * @param array $options
     * @return array
     */
    public function select($question, $options)
    {
        // TODO: Implement select() method.
    }

    /**
     * Get single selection from user.
     *
     * @param string $question
     * @param array $options
     * @return string
     */
    public function choose($question, $options)
    {
        // TODO: Implement choose() method.
    }
}
