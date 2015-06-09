<?php

namespace Acme\Support\Http;

interface Server
{
    public function send(Response $request);
}
