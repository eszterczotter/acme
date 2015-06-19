<?php

namespace Acme\Application\Contract;

interface Application
{

    public static function create($basePath);

    public function run();

    public function bootstrap();

    public function debug();

    public function basePath();

    public function bootPath();

    public function configPath();

    public function publicPath();

    public function storagePath();

    public function logPath();

    public function resourcePath();

    public function templatePath();
}
