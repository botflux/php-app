<?php

$app->get('/^\/$/', function () use ($app) {
    $app->render('index.phtml', [
        'message' => 'hello world'
    ]);
});