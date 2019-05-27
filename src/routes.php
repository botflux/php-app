<?php

use App\Router\Request;
use App\Router\Response;

$app->get('/^\/$/', function (Request $request, Response $response) use ($app) {

    return $app->render('index.phtml', [
        'message' => 'hello world'
    ]);
});