<?php

return [
    'exceptions' => [
        \Acme\Support\Http\Router\Exceptions\RouteNotFoundException::class =>
            \Acme\Application\Http\Exceptions\Handlers\RouteNotFoundHandler::class,

        \Acme\Support\Http\Router\Exceptions\MethodNotAllowedException::class =>
            \Acme\Application\Http\Exceptions\Handlers\MethodNotAllowedHandler::class,
        
        // \Exception::class => [ \Handler::class, \Handler::class ]
    ],
];
