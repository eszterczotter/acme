<?php

namespace Acme\Support\Http\Request;

use Psr\Http\Message\ServerRequestInterface;

interface Request extends ServerRequestInterface
{
    public function validate();
}
