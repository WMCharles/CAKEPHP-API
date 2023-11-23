<?php

return [
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),
    'Security' => [
        'salt' => env('SECURITY_SALT', 'cdf95a4144253777e9fe355a75e7df917177dd101c2ba776487699d3783fcec3'),
    ],

    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'mysql',
            'database' => 'farm_management_db',
            'url' => env('DATABASE_URL', null),
        ],
       
        'test' => [
            'host' => 'localhost',
            'username' => 'my_app',
            'password' => 'secret',
            'database' => 'test_myapp',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tmp/tests.sqlite'),
        ],
    ],

   
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
