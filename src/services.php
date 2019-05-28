<?php

$container = $app->getContainer();

$container['renderer'] = function ($c) {
    return new App\Renderer\Renderer($c['settings']['renderer']['templateFolder']);
};

$container['pdo'] = function ($c) {
    $settings = $c['settings']['database'];
    return new PDO("mysql:dbname={$settings['base']};host={$settings['host']}", $settings['username'], $settings['password']);
};
