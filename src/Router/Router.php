<?php

namespace App\Router;

use App\Router\Exception\RouteNotFoundException;

/**
 * Application router
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
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
     * Returns all routes
     *
     * @return array
     */
    public function getRoutes (): array {
        return $this->routes;
    }
}