<?php

namespace Acme\Support\Config;

use Acme\Support\Container\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $application = $this->container->get('app');
        $this->container->singleton(Config::class, new NoodleConfig($application->configPath()));
        $this->container->alias('config', Config::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            'config',
            Config::class
        ];
    }
}
