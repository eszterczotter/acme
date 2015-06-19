<?php

namespace Acme\Application\Http\Web\Controllers;

use Acme\Support\Config\Config;

class PageController extends Controller
{
    public function home(Config $config)
    {
        $app = $config->get('app');
        return $this->respond($app['name'] . ' version ' . $app['version']);
    }
}
