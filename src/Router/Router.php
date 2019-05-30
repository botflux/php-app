<?php

namespace App\Router;

/**
 * Application router
 */
class Router {
    /**
     * An array that holds all routes
     *
     * @var Route[]
     */
    private $routes = [];

    /**
     * Register a new route
     *
     * @param Route $route
     * @return self
     */
    public function registerRoute (Route $route) : self {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * Execute the router
     *
     * @param Request $request
     * @return self
     */
    public function execute (Request $request) : self {

        // filter route that matchs the request method
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
            throw new \Exception('No route found');
        }

        try {
            $response = $matchingRoute->getCallback ()($request, new Response());

            foreach ($response->getHeaders() as $header) {
                header ("{$header->getName()}: {$header->getValue()}");
            }

            echo $response->getBody();

        } catch (\Exception $e) {
            throw $e;
        }

        return $this;
    }
}