<?php

namespace Acme\Support\Http;

interface Server
{
    public function start();

    public function stop();

    public function send(Response $request);
}
