<?php


return [
    'middleware' => [
        Acme\Application\Http\Middleware\SendResponse::class,
        Acme\Application\Http\Middleware\DispatchRoute::class,
    ]
];
