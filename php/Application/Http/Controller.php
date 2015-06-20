<?php

namespace Acme\Application\Http;

use Acme\Support\Container\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    /**
     * The current Request value object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The current Response value object.
     *
     * @var Response
     */
    protected $response;

    /**
     * @var Container
     */
    private $container;

    /**
     * Set the Request.
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Set the Response.
     *
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Set the Container.
     *
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Respond with the given string.
     *
     * @param string|null $content
     * @return Response
     */
    protected function respond($content = null)
    {
        if (is_null($content)) {
            return $this->response;
        }

        $this->response->getBody()->write($content);
        return $this->respond();
    }

    /**
     * Respond with the given view.
     *
     * @param string $template
     * @param array $data
     * @return Response
     */
    protected function view($template, $data = [])
    {
        $view = $this->container->get('view');
        return $this->respond($view->render($template, $data));
    }

    /**
     * Execute a command.
     *
     * @param string|object $command
     * @param array|null $data
     * @return mixed
     */
    protected function execute($command, array $data = null)
    {
        if (is_string($command)) {
            $command = $this->resolveCommand($command, $data);
        }

        $bus = $this->container->get('bus');

        return $bus->execute($command);
    }

    /**
     * Resolve the command out of the Container.
     *
     * @param string $command
     * @param array|null $data
     * @return mixed
     */
    private function resolveCommand($command, array $data = null)
    {
        if (!is_null($data)) {
            return $this->container->get($command, $data);
        } else {
            return $this->container->get($command, $this->request->getParsedBody());
        }
    }
}
