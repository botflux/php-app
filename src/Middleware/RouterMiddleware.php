<?php

namespace App\Middleware;

use App\Router\Route;
use App\Router\Request;
use App\Router\Response;
use App\Router\Exception\RouteNotFoundException;

/**
 * Router middleware
 */
class RouterMiddleware
{
    /**
     * @var Route[]
     */
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        $methodRelatedRoutes = array_filter ($this->routes, function (Route $element) use ($request) {
            return $element->getMethod() === 'any' || strtolower ($element->getMethod()) === strtolower ($request->getMethod());
        });
        
        // find the first route that matchs the request
        $matchingRoute = array_reduce($methodRelatedRoutes, function ($prev, Route $element) use ($request) {
            if (preg_match($element->getRoute(), $request->getUri())) {
                return $element;
            }

            return $prev;
        }, null);


        if (!$matchingRoute) {
            throw new RouteNotFoundException (sprintf('No route matching %s %s', $request->getMethod (), $request->getUri ()));
        }

        // finds the named regex in URI.
        $matchs = [];
        preg_match($matchingRoute->getRoute(), $request->getUri(), $matchs);
        $request->setParams($matchs);

        return $matchingRoute->getCallback ()($request, $response);
    }
}