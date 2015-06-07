<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Application;

class SymfonyConsole implements Console
{

    /**
     * The Symfony Application instance.
     *
     * @var Application
     */
    private $application;

    /**
     * Create a new Symfony Console.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Add a command to the console.
     *
     * @param Command $command
     * @return Console
     */
    public function command($command)
    {
        $this->application->add(new SymfonyCommand($command));
        return $this;
    }

    /**
     * Execute script.
     *
     * @return void
     */
    public function execute()
    {
        $this->application->run();
    }

    /**
     * Set the name.
     *
     * @param string $name
     * @return Console
     */
    public function name($name)
    {
        $this->application->setName($name);
        return $this;
    }

    /**
     * Set the version.
     *
     * @param string $version
     * @return Console
     */
    public function version($version)
    {
        $this->application->setVersion($version);
        return $this;
    }
}
