<?php

use Acme\Support\Container\Container;

if (! function_exists('env')) {
    function env($variable)
    {
        $env = Container::instance()->get('env');

        return $env->get($variable);
    }
}
