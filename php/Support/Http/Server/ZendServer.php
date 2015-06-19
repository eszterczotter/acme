<?php

namespace Acme\Support\Http\Server;

use Acme\Support\Http\Router\Router;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\EmitterInterface;

class ZendServer implements Server
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var EmitterInterface
     */
    private $emitter;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    /**
     * @param Router $router
     * @param EmitterInterface $emitter
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Router $router, EmitterInterface $emitter, Request $request, Response $response)
    {
        $this->router = $router;
        $this->emitter = $emitter;
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Serve webpages.
     *
     * @return void
     */
    public function serve()
    {
        $response = $this->router->dispatch($this->request, $this->response);
        $this->send($response);
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
