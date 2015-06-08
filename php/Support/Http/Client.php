<?php

namespace Acme\Support\Http;

interface Client
{
    public function send(Request $request);
}
