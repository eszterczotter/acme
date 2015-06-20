<?php

return [
    'database' => [

        'entities' => [
            path('config') . '/entities',
        ],

        'connection' => [
            'driver'    => 'pdo_sqlite',
            'path'      => path('storage') . '/database/db.sqlite',
            // 'memory'    => false,
            // 'user'      => '',
            // 'password'  => '',
        ],
    ],
];
