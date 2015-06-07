<?php

namespace Acme\Support\Console;

use Symfony\Component\Console\Application;

class SymfonyConsole implements Console
{

    /**
     * @var Application
     */
    private $console;

    public function __construct(Application $console)
    {
        $this->console = $console;
    }

    /**
     * Add a command to the console.
     *
     * @param Command $command
     * @return Console
     */
    public function command($command)
    {
        $this->console->add(new SymfonyCommand($command));
    }

    /**
     * Execute script.
     *
     * @return void
     */
    public function execute()
    {
        $this->console->run();
    }

    /**
     * Set the name.
     *
     * @param string $name
     * @return Console
     */
    public function name($name)
    {
        $this->console->setName($name);
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
        $this->console->setVersion($version);
        return $this;
    }
}
