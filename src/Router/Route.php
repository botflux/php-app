<?php

namespace App\Router;

/**
 * Represents a Route
 */
class Route {
    /**
     * The route method
     * 
     * @var string
     */
    private $method;

    /**
     * The route regex
     * 
     * @var string
     */
    private $route;

    /**
     * The route callback
     * 
     * @var callable
     */
    private $callback;

    /**
     * Initializes a new instance of _Route_.
     * 
     * @param string $method
     * @param string $route Route as a Regex
     * @param callable $callback
     */
    public function __construct(string $method, string $route, callable $callback)
    {
        $this->method = $method;
        $this->route = $route;
        $this->callback = $callback;
    }

    /**
     * Returns route method
     *
     * @return string
     */
    public function getMethod () : string {
        return $this->method;
    }

    /**
     * Returns route regex
     *
     * @return string
     */
    public function getRoute () : string {
        return $this->route;
    }

    /**
     * Returns route callback
     *
     * @return callable
     */
    public function getCallback () : callable {
        return $this->callback;
    }

    /**
     * Sets the route method
     *
     * @param string $method
     * @return self
     */
    public function setMethod (string $method) : self {
        $this->method = $method;
        return $this;
    }

    /**
     * Sets the route regex
     *
     * @param string $route
     * @return self
     */
    public function setRoute (string $route) : self {
        $this->route = $route;
        return $this;
    }

    /**
     * Sets the route callback
     *
     * @param callable $callback
     * @return self
     */
    public function setCallback (callable $callback) : self {
        $this->callback = $callback;
        return $this;
    }
}