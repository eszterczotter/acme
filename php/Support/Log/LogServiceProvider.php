<?php

namespace Acme\Support\Log;

use Acme\Support\Container\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Log::class,
            'log',
        ];
    }
}
