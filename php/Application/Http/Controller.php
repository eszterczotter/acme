<?php

namespace Acme\Application\Http;

use Acme\Support\Container\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    protected function respond($content)
    {
        $this->response->getBody()->write($content);
        return $this->response;
    }

    protected function view($template, $data = [])
    {
        $view = $this->container->get('view');
        return $this->respond($view->render($template, $data));
    }
}
