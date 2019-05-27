<?php

namespace App\Core;

use App\Router\Router;
use App\Router\Request;
use App\Router\Response;
use App\Router\Route;
use App\Renderer\Renderer;

class Core {
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var array
     */
    private $dependencies;

    public function __construct(array $dependencies)
    {
        $this->router = $dependencies['router'];
        $this->renderer = $dependencies['renderer'];
        $this->dependencies = $dependencies;
    }

    /**
     * Run the application
     *
     * @return void
     */
    public function run () {
        $request = new Request($_SERVER);
        $this->router->execute($request);
    }

    /**
     * Add a new route for GET method
     *
     * @param string $route
     * @param callable $callback
     * @return void
     */
    public function get (string $route, callable $callback) {
        $this->router->registerRoute(
            new Route('GET', $route, $callback)
        );
    }

    /**
     * Render the given template
     *
     * @param string $templateName
     * @param array $context
     * @return void
     */
    public function render (string $templateName, array $context) {
        return (new Response ())
            ->setHeader('Content-type', 'text/html; charset=utf8')
            ->setBody($this->renderer->render($templateName, $context))
        ;
    }
}