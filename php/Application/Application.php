<?php

namespace Acme\Application;

use Acme\Support\Container\Container;

class Application implements Contract\Application
{
    /**
     * The path to our application.
     *
     * @var string
     */
    protected $path;

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
            return new Http\Application($basePath);
        }
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

    public function bootstrap()
    {
        $container = $this->container();

        $container->singleton(Contract\Application::class, $this);
        $container->alias('app', Contract\Application::class);

        $services = require $this->configPath() . '/services.php';

        foreach ($services['services'] as $service) {
            $container->register($service);
        }
    }

    public function debug()
    {
        $debug = $this->container()->get('debug');
        $debug->register();
    }

    public function container()
    {
        return Container::instance();
    }

    public function basePath()
    {
        return $this->path;
    }

    public function bootPath()
    {
        return $this->basePath() . '/bootstrap';
    }

    public function configPath()
    {
        return $this->basePath() . '/config';
    }

    public function publicPath()
    {
        return $this->basePath() . '/public';
    }

    public function storagePath()
    {
        return $this->basePath() . '/storage';
    }

    public function logPath()
    {
        return $this->storagePath() . '/logs';
    }

    public function resourcePath()
    {
        return $this->basePath() . '/resources';
    }

    public function templatePath()
    {
        return $this->resourcePath() . '/templates';
    }
}
