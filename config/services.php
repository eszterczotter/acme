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
        Acme\Support\Http\Server\ServerServiceProvider::class,
        Acme\Support\Http\Kernel\KernelServiceProvider::class,
        Acme\Support\Http\View\ViewServiceProvider::class,
        Acme\Support\Doctrine\DoctrineServiceProvider::class,
        Acme\Support\Bus\BusServiceProvider::class,
    ],
];
