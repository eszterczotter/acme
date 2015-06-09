<?php

namespace Acme\Support\Http;

interface Router
{
    public function get($path, $controller);

    public function post($path, $controller);

    public function put($path, $controller);

    public function patch($path, $controller);

    public function delete($path, $controller);

    public function head($path, $controller);

    public function options($path, $controller);

    public function dispatch($method, $path);
}
