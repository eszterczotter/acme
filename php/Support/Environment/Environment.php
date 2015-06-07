<?php

namespace Acme\Support\Environment;

interface Environment
{

    public function load();

    public function overload();

    public function required($variable, array $options = null);

    public function get($variable);
}
