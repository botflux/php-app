<?php

namespace App\Middleware;

use App\Router\Request;
use App\Router\Response;

class HelloMiddleware
{
    public function __invoke(Request $request, Response $response, callable $next) : Response
    {
        $response = $next($request, $response);

        $response->setHeader('hello', 'world');

        return $response;
    }
}