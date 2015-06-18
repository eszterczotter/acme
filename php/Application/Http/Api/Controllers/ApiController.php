<?php

namespace Acme\Application\Http\Api\Controllers;

use Acme\Support\Config\Config;

class ApiController extends Controller
{
    /**
     * @var Config
     */
    private $config;

    /**
     * PageController constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function index()
    {
        $app = $this->config->get('app');
        return $this->respond($app['name'] . ' API, version ' . $app['version']);
    }
}
