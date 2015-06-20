<?php

use Acme\Support\Container\Container;

if (! function_exists('path')) {
    function path($dir)
    {
        $app = Container::instance()->get('app');

        if ($dir == 'base') {
            return $app->basePath();
        }

        if ($dir == 'boot') {
            return $app->bootPath();
        }

        if ($dir == 'config') {
            return $app->configPath();
        }

        if ($dir == 'public') {
            return $app->publicPath();
        }

        if ($dir == 'storage') {
            return $app->storagePath();
        }

        if ($dir == 'log') {
            return $app->logPath();
        }

        if ($dir == 'resource') {
            return $app->resourcePath();
        }

        if ($dir == 'template') {
            return $app->templatePath();
        }

        return null;
    }
}
