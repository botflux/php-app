<?php

namespace App\Router;

/**
 * Represents a Route
 */
class Route {
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $route;

    /**
     * @var callable
     */
    private $callback;

    public function __construct(string $method, string $route, callable $callback)
    {
        $this->method = $method;
        $this->route = $route;
        $this->callback = $callback;
    }

    public function getMethod () : string {
        return $this->method;
    }

    public function getRoute () : string {
        return $this->route;
    }

    public function getCallback () : callable {
        return $this->callback;
    }

    public function setMethod (string $method) : self {
        $this->method = $method;
        return $this;
    }

    public function setRoute (string $route) : self {
        $this->route = $route;
        return $this;
    }

    public function setCallback (callable $callback) : self {
        $this->callback = $callback;
        return $this;
    }
}