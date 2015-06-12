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
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $response = $this->router->dispatch($method, $path);
        $this->emitter->emit($response);
    }
}
