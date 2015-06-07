<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Input\InputInterface;

class SymfonyInput implements Input
{

    /**
     * The Symfony Input interface.
     *
     * @var InputInterface
     */
    private $input;

    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    /**
     * Get the script arguments.
     *
     * @return array
     */
    public function arguments()
    {
        return array_merge($this->input->getOptions(), $this->input->getArguments());
    }

    /**
     * Get an argument.
     * @param string $name
     * @return string
     */
    public function argument($name)
    {
        return $this->input->getArgument($name) ?: $this->input->getOption($name);
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
