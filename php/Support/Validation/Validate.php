<?php

namespace Acme\Support\Validation;

trait Validate
{

    public function __invoke($command)
    {
        $this->validate($command);
    }

    abstract protected function validate($command);
}
