<?php

namespace Acme\Application\Http\Api\Controllers;

use Acme\Support\Config\Config;

class ApiController extends Controller
{
    public function index(Config $config)
    {
        $app = $config->get('app');
        return $this->respond($app['name'] . ' API, version ' . $app['version']);
    }
}
