<?php

namespace Acme\Support\Validation;

use Acme\Support\Container\ServiceProvider;
use Respect\Validation\Factory;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Validation::class, [$this, 'make']);

        $this->container->alias('validation', Validation::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Validation::class,
            'validation',
        ];
    }

    public function make()
    {
        return new RespectValidation(new Factory());
    }
}
