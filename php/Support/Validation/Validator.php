<?php

namespace Acme\Support\Validation;

interface Validator
{
    public function __invoke($command);
}
