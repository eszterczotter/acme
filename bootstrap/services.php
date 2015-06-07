<?php

/**
 * @var \Acme\Support\Container\Container $container
 */

$container->register(Acme\Support\Console\ConsoleServiceProvider::class);

$container->register(Acme\Support\Config\ConfigServiceProvider::class);

$container->register(Acme\Support\Environment\EnvironmentServiceProvider::class);

$container->register(Acme\Support\Log\LogServiceProvider::class);
