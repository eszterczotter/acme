<?php

namespace Acme\Application\Contract;

interface Application
{

    public static function create($basePath);

    public function run();

    public function bootstrap();
}
