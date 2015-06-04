<?php

namespace Acme\Application;

class Application implements \Acme\Support\Contract\Application
{
    /**
     * Create an application of the appropriate type.
     *
     * @param $basePath
     * @return \Acme\Support\Contract\Application
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
}
