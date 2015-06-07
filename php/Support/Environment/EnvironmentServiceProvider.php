<?php

namespace Acme\Support\Environment;

use Acme\Support\Container\ServiceProvider;

class EnvironmentServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->container->get('app');
        $this->container->singleton(Environment::class, new DotEnvironment($app->basePath()));
        $this->container->alias('env', Environment::class);
        $this->container->inflector(Environment::class, [$this, 'configure']);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Environment::class,
            'env',
        ];
    }

    public function configure(Environment $env)
    {
        $env->load();

        $app = $this->container->get('app');

        $environment = require $app->configPath() . "/environment.php";

        foreach ($environment['environment'] as $variable => $options) {
            if (is_int($variable)) {
                $variable = $options;
                $options = null;
            }

            $env->required($variable, $options);

        }

    }
}
