<?php

namespace Acme\Application\Http\Web\Controllers;

use Acme\Support\Config\Config;

class PageController extends Controller
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

    public function home()
    {
        $app = $this->config->get('app');
        return $this->respond($app['name'] . ' version ' . $app['version']);
    }
}
