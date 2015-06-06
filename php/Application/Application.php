<?php

namespace Acme\Application;

use Acme\Support\Container\Container;

class Application implements Contract\Application
{
    /**
     * @var
     */
    private $path;

    /**
     * The root directory.
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Create an application of the appropriate type.
     *
     * @param $basePath
     * @return \Acme\Application\Contract\Application
     */
    public static function create($basePath)
    {
        if (PHP_SAPI == 'cli') {
            return new Cli\Application($basePath);
        } else {
            return Http\Application::create($basePath);
        }
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

    public function bootstrap()
    {
        $this->container()->singleton('app', $this);
    }

    public function container()
    {
        return Container::instance();
    }
}
