<?php

namespace Acme\Support\Debug;

interface Handler
{

    public function handle(\Exception $exception);
}
