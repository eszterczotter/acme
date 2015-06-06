<?php

namespace Acme\Support\Console;

use League\CLImate\CLImate;

class LeagueInput implements Input
{
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
     * Get the script arguments.
     *
     * @return array
     */
    public function arguments()
    {
        return $this->climate->arguments->all();
    }

    /**
     * Get an argument.
     * @param string $name
     * @return string
     */
    public function argument($name)
    {
        return $this->climate->arguments->get($name);
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
        $input = $this->climate->input($question);

        $input->defaultTo($default);

        return $input->prompt();
    }

    /**
     * Get yes or no from user.
     *
     * @param string $question
     * @return boolean
     */
    public function confirm($question)
    {
        $input = $this->climate->confirm($question);

        return $input->confirmed();
    }

    /**
     * Get password from user.
     *
     * @param string $question
     * @return string
     */
    public function password($question)
    {
        $input = $this->climate->password($question);

        return $input->prompt();
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
        $input = $this->climate->checkboxes($question, $options);

        return $input->prompt();
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
        $input = $this->climate->radio($question, $options);

        return $input->prompt();
    }
}
