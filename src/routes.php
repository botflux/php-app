<?php

use App\Router\Request;
use App\Router\Response;

$app->get('/^\/$/', function (Request $request, Response $response) use ($app) {
    return $app->render('index.phtml', [
        'message' => 'hello world'
    ]);
});

$app->get('/^\/about$/', function (Request $request, Response $response) use ($app) {
    return $app->render('about.phtml', []);
});

$app->get('/^\/products$/', function () use ($app) {
    
    $pdo = $app->getContainer()['pdo'];

    $statement = $pdo->prepare('SELECT * FROM product');
    
    if (!$statement->execute()) {
        return $app->render('error.phtml', []);
    }

    return $app->render('products.phtml', [
        'products' => $statement->fetchAll(\PDO::FETCH_ASSOC)
    ]);
});

$app->post('/^\/$/', function (Request $request, Response $response) use ($app) {
    return $app->render('about.phtml', []);
});