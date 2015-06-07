<?php

namespace Acme\Support\Debug;

interface Debug
{
    /**
     * Run the debugger.
     *
     * @return void
     */
    public function register();

    /**
     * Add a handler to the debugger.
     *
     * @param string $exception
     * @param string $handler
     * @return Debug
     */
    public function handler($exception, $handler);
}
