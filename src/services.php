<?php
use App\Session\SessionHandler;
use App\Session\FlashMessage\Bag;
use App\Mailing\Mailing;

$container = $app->getContainer();

$container['session.handler'] = function ($c) {
    return new SessionHandler();
};

$container['session.flash'] = function ($c) {
    return new Bag($c['session.handler']);
};

$container['renderer'] = function ($c) {
    return new App\Renderer\Renderer($c['settings']['renderer']['templateFolder'], $c['session.flash']);
};

$container['pdo'] = function ($c) {
    $settings = $c['settings']['database'];
    return new PDO("mysql:dbname={$settings['base']};host={$settings['host']}", $settings['username'], $settings['password']);
};


$container['mailing'] = function ($c) {
    return new Mailing($c['session.flash']);
};