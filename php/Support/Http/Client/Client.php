<?php

namespace Acme\Support\Http\Client;

use Acme\Support\Http\Request\Request;
use Acme\Support\Http\Response\Response;

interface Client
{
    /**
     * Send a Request and return a Response.
     *
     * @param Request $request
     * @return Response
     */
    public function send(Request $request);
}
