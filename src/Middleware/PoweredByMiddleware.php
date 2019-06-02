<?php

namespace App\Middleware;

use App\Router\Request;
use App\Router\Response;

/**
 * Middleware that remove the X-Powered-By header from the response
 */
class PoweredByMiddleware
{
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $response = $next($request, $response);

        return $response->setHeader('X-Powered-By', '');
    }
}