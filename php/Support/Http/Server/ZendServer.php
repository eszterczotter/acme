<?php

namespace Acme\Support\Http\Server;

use Acme\Support\Http\Router\Router;
use Psr\Http\Message\RequestInterface;
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
     * @var RequestInterface
     */
    private $request;

    public function __construct(Router $router, EmitterInterface $emitter, RequestInterface $request)
    {
        $this->router = $router;
        $this->emitter = $emitter;
        $this->request = $request;
    }

    /**
     * Serve webpages.
     *
     * @return void
     */
    public function serve()
    {
        $response = $this->router->dispatch($this->request->getMethod(), $this->request->getUri()->getPath());
        $this->emitter->emit($response);
    }
}
