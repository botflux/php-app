<?php

$projectRoot = __DIR__ . '/..';

return [
    'renderer' => [
        'templateFolder' => "$projectRoot/template"
    ],
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'username' => 'root',
        'password' => '',
        'base' => 'php-app'
    ]
];