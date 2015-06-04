<?php

namespace Acme\Support\Contract;

use League\Container\ContainerInterface;

interface Container extends ContainerInterface
{

    public static function instance();
}
