<?php

namespace Acme\Support\Contract;

interface Application
{

    public static function create($basePath);

    public function run();

    public function bootstrap();
}
