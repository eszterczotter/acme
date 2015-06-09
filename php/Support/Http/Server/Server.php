<?php

namespace Acme\Support\Http\Server;

interface Server
{
    /**
     * Serve webpages.
     *
     * @return void
     */
    public function serve();
}
