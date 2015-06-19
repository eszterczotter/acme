<?php

namespace Acme\Application\Http\Web\Controllers;

use Acme\Support\Config\Config;

class PageController extends Controller
{
    public function home(Config $config)
    {
        return $this->view('page/home', [
            'name' => $config->get('app.name'),
            'version' => $config->get('app.version'),
        ]);
    }
}
