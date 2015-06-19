<?php

namespace Acme\Application\Http;

class Application extends \Acme\Application\Application
{
    public function run()
    {
        $request = $this->container()->get('request');
        $response = $this->container()->get('response');
        $kernel = $this->container()->get('kernel');
        $kernel->process($request, $response);
    }
}
