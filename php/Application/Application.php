<?php

namespace Acme\Application;

use Acme\Support\Container\Container;

class Application implements Contract\Application
{
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
        // TODO: Implement bootstrap() method.
    }

    public function container()
    {
        return Container::instance();
    }
}
