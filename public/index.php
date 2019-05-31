<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php'; 

use App\Core\Core;

$settings = require_once __DIR__ . '/../config/config.php';

$app = new Core($settings);

require_once __DIR__ . '/../src/services.php';
require_once __DIR__ . '/../src/middlewares.php';
require_once __DIR__ . '/../src/routes.php';

$app->run();
