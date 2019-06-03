<?php

use App\Router\Request;
use App\Router\Response;
use App\Validation\Forms\ArticleForm;

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

$app->route('/^\/$/', function (Request $request, Response $response) use ($app) {
    return $app->render('about.phtml', []);
});

$app->route('/^\/form/', function (Request $request, Response $response) use ($app) {

    $form = new ArticleForm();

    if ($request->getMethod() === 'POST') {
        
        if ($form->isValid($request)) {
            $message = 'Form ok';
        } else {
            $message = 'Form not ok';
        }
    }

    return $app->render('form.phtml', [
        'message' => $message ?? ''
    ]);
});