<?php

namespace App\Middleware;

use App\Router\Request;
use App\Router\Response;

/**
 * Example middleware that add an _hello_ header containing world in the header
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class HelloMiddleware
{
    public function __invoke(Request $request, Response $response, callable $next) : Response
    {
        $response = $next($request, $response);

        $response->setHeader('hello', 'world');

        return $response;
    }
}