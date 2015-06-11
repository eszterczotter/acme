<?php

namespace Acme\Support\Http\Request;

use Zend\Diactoros\ServerRequest;

class DiactorosRequest extends ServerRequest implements Request
{
    public function __construct(ServerRequest $request)
    {
        parent::__construct(
            $request->getServerParams(),
            $request->getUploadedFiles(),
            $request->getUri(),
            $request->getMethod(),
            $request->getBody(),
            $request->getHeaders()
        );
    }

    public function validate()
    {
        //TODO
    }
}
