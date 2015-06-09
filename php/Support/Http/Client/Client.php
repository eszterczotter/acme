<?php

namespace Acme\Support\Http\Client;

use Acme\Support\Http\Request\Request;

interface Client
{
    /**
     * Send a Request to a client and run the callback
     * with the Response as an argument.
     *
     * @param Request $request
     * @param callable $callback
     * @return void
     */
    public function send(Request $request, callable $callback);
}
