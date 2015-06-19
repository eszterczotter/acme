<?php

namespace Acme\Support\Http\Server;

use Psr\Http\Message\ResponseInterface as Response;

interface Server
{
    /**
     * Serve webpages.
     *
     * @return void
     */
    public function serve();

    /**
     * Send a response.
     *
     * @param Response $response
     * @return Response
     */
    public function send(Response $response);
}
