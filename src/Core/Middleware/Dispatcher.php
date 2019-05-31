<?php

namespace App\Core\Middleware;

use App\Router\Request;
use App\Router\Response;

/**
 * Middleware dispatcher
 */
class Dispatcher {
    /**
     * An array of callable
     *
     * @var callable[]
     */
    private $middlewares = [];

    /**
     * Index of the current middleware
     *
     * @var integer
     */
    private $index = 0;

    /**
     * Add a new middleware to the middlewares stack
     *
     * @param callable $middleware
     * @return self
     */
    public function add (callable $middleware): self {
        $this->middlewares[] = $middleware;

        return $this;
    }
    
    /**
     * Dispatches all middleware
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function dispatch (Request $request, Response $response) {
        $middleware = $this->getMiddleware();
        $this->index ++;

        if (is_null($middleware)) {
            return $response;
        }

        return $middleware($request, $response, [$this, 'dispatch']);
    }

    /**
     * Get the current middleware.
     * Returns null when there is no middleware left.
     *
     * @return callable|null
     */
    private function getMiddleware (): ?callable {
        return isset($this->middlewares[$this->index]) ? $this->middlewares[$this->index] : null;
    }
}