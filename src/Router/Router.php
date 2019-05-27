<?php

namespace App\Router;

class Router {
    private $routes = [];

    public function registerRoute (Route $route) : self {
        $this->routes[] = $route;
        return $this;
    }

    public function execute (Request $request) : self {

        $methodRelatedRoutes = array_filter ($this->routes, function (Route $element) use ($request) {
            return strtolower ($element->getMethod()) === strtolower ($request->getMethod());
        });

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