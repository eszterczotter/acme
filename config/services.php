<?php

return [
    'services' => [
        Acme\Support\Log\LogServiceProvider::class,
        Acme\Support\Debug\DebugServiceProvider::class,
        Acme\Support\Environment\EnvironmentServiceProvider::class,
        Acme\Support\Config\ConfigServiceProvider::class,
        Acme\Support\Console\ConsoleServiceProvider::class,
        Acme\Support\Http\Request\RequestServiceProvider::class,
        Acme\Support\Http\Response\ResponseServiceProvider::class,
        Acme\Support\Http\Router\RouterServiceProvider::class,
    ],
];
