<?php

/**
 * Register middleware in this file
 */

use App\Middleware\HelloMiddleware;
use App\Middleware\PoweredByMiddleware;

$app
    ->add(new HelloMiddleware())
    ->add(new PoweredByMiddleware())
;
