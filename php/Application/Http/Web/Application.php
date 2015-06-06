<?php

namespace Acme\Application\Http\Web;

class Application extends \Acme\Application\Http\Application
{
    public function run()
    {
        $config = $this->container()->get('config');
        echo "<html><body>" . $config->get('app.name') .
             " " . $config->get('app.version')  . "</body></html>";
    }
}
