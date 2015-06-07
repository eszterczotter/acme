<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class SymfonyInput implements Input
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

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
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
        return $this->ask(new Question($question, $default));
    }

    /**
     * Get yes or no from user.
     *
     * @param string $question
     * @return boolean
     */
    public function confirm($question)
    {
        return $this->ask(new ConfirmationQuestion($question, false));
    }

    /**
     * Get password from user.
     *
     * @param string $question
     * @return string
     */
    public function password($question)
    {
        $question = new Question($question);
        $question->setHidden(true);
        return $this->ask($question);
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
        return $this->choice($question, $options, true);
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
        return $this->choice($question, $options);
    }

    private function choice($question, $options, $multiple = false)
    {
        $question = new ChoiceQuestion($question, $options);
        $question->setMultiselect($multiple);
        return $this->ask($question);
    }

    private function ask(Question $question)
    {
        return (new QuestionHelper())->ask($this->input, $this->output, $question);
    }
}
