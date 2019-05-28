<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php'; 

use App\Core\Core;

$settings = require_once __DIR__ . '/../config/config.php';

$app = new Core ([
    'router' => new App\Router\Router(),
    'renderer' => new App\Renderer\Renderer($settings['renderer']['templateFolder'])
]);
// var_dump($_SERVER);

require_once __DIR__ . '/../src/routes.php';

$app->run();
