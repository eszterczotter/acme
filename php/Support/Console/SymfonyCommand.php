<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Command\Command as SCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SymfonyCommand extends SCommand
{
    /**
     * @var Command
     */
    private $command;


    /**
     * SymfonyCommand constructor.
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName($this->command->name())
             ->setDescription($this->command->description());

        foreach ($this->getArguments() as $argument => $settings) {
            $settings = $this->mergeWithDefaults($settings);

            $this->addInput($argument, $settings);
        }

    }


    public function execute(InputInterface $sInput, OutputInterface $sOutput)
    {

        $input = new SymfonyInput($sInput, $sOutput);
        $output = new SymfonyOutput($sInput, $sOutput);

        $this->command->execute($input, $output);

    }

    private function addParameter($argument, $settings)
    {
        $this->addArgument(
            $argument,
            InputArgument::REQUIRED,
            $settings['description'],
            $settings['default']
        );
    }

    private function addFlag($argument, $settings)
    {
        $this->addOption(
            $argument,
            $settings['shortcut'],
            InputOption::VALUE_NONE,
            $settings['description'],
            $settings['default']
        );
    }

    private function addModifier($argument, $settings)
    {
        $this->addOption(
            $argument,
            $settings['shortcut'],
            InputOption::VALUE_OPTIONAL,
            $settings['description'],
            $settings['default']
        );
    }

    private function addInput($argument, $settings)
    {
        if ($settings['flag']) {
            $this->addFlag($argument, $settings);

        } elseif ($settings['required']) {
            $this->addParameter($argument, $settings);

        } else {
            $this->addModifier($argument, $settings);

        }
    }

    private function mergeWithDefaults($settings)
    {
        return array_merge([
            'required' => true,
            'description' => '',
            'default' => null,
            'shortcut' => null,
            'flag' => false,
        ], $settings);
    }

    private function isAssociative($array)
    {
        return count(array_filter(array_keys($array), 'is_string'));
    }

    private function getArguments()
    {
        $arguments = $this->command->arguments();

        if (!$this->isAssociative($arguments)) {
            $arguments = array_map(function ($argument) {
                return [];
            }, array_combine($arguments, $arguments));
            return $arguments;
        }
        return $arguments;
    }
}
