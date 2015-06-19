<?php

return [
    'routes' => [
        '/' => [
            'GET' => [Acme\Application\Http\Web\Controllers\PageController::class, 'home'],
        ],
        '/api' => [
            'GET' => [Acme\Application\Http\Api\Controllers\ApiController::class, 'index'],
        ],
        '/test' => [
            'GET' => [Acme\Application\Http\Web\Controllers\PageController::class, 'test'],
        ],
    ]
];
