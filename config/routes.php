<?php

return [
    'routes' => [
        '/' => [
            'GET' => [Acme\Application\Http\Web\Controllers\PageController::class, 'home'],
        ],
    ]
];
