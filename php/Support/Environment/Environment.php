<?php

namespace Acme\Support\Environment;

interface Environment
{

    public function load();

    public function overload();

    public function required($variable, $options = []);

    public function get($variable);
}
