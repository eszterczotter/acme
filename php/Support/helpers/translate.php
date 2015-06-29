<?php

use Acme\Support\Container\Container;

if (! function_exists('translate')) {
    function translate($message, $parameters = [], $number = null, $language = null)
    {
        $translator = Container::instance()->get('translator');

        return $translator->translate($message, $parameters, $number, $language);
    }
}
