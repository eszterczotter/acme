<?php

namespace Acme\Support\Bus;

trait CommandTranslator
{
    protected function translate($class, $type)
    {
        preg_match('/^(.+?\\\\?)??(\w+)Command$/', $class, $match);

        $nameSpace = $match[1];
        $commandName = $match[2];

        return $nameSpace . $type . 's\\' . $commandName . $type;
    }
}
