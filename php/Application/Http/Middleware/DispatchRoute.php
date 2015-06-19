<?php

namespace Acme\Application\Http\Middleware;

use Acme\Support\Http\Kernel\Middleware;
use Acme\Support\Http\Router\Router;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DispatchRoute implements Middleware
{
    /**
     * @var Router
     */
    private $router;

    /**
     * Create a new instance.
     *
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Dispatch the route.
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        return $this->router->dispatch($request, $response);
    }
}
