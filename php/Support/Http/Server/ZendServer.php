<?php

namespace Acme\Support\Http\Server;

use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\EmitterInterface;

class ZendServer implements Server
{
    /**
     * @var EmitterInterface
     */
    private $emitter;

    /**
     * @param EmitterInterface $emitter
     */
    public function __construct(EmitterInterface $emitter)
    {
        $this->emitter = $emitter;
    }

    /**
     * Send a response.
     *
     * @param Response $response
     * @return Response
     */
    public function send(Response $response)
    {
        $this->emitter->emit($response);

        return $response;
    }
}
