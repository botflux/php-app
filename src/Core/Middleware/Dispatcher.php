<?php

namespace App\Core\Middleware;

use App\Router\Request;
use App\Router\Response;

class Dispatcher {
    private $middlewares = [];
    private $index = 0;

    public function add (callable $middleware): self {
        $this->middlewares[] = $middleware;

        return $this;
    }
    
    public function dispatch (Request $request, Response $response) {
        $middleware = $this->getMiddleware();
        $this->index ++;

        if (is_null($middleware)) {
            return $response;
        }

        return $middleware($request, $response, [$this, 'dispatch']);
    }

    private function getMiddleware (): ?callable {
        return isset($this->middlewares[$this->index]) ? $this->middlewares[$this->index] : null;
    }
}