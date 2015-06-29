<?php

use Acme\Support\Container\Container;

if (! function_exists('path')) {
    function path($dir)
    {
        $app = Container::instance()->get('app');

        return $app->{$dir . 'Path'}();
    }
}
