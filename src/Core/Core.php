<?php

namespace App\Core;

use App\Router\Router;
use App\Router\Request;
use App\Router\Response;
use App\Router\Route;
use App\Renderer\Renderer;
use App\Core\Middleware\Dispatcher;
use App\Middleware\RouterMiddleware;

class Core {
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * Application service container
     *
     * @var ServiceContainer
     */
    private $serviceContainer;

    public function __construct(array $settings)
    {
        // $this->router = $dependencies['router'];
        // $this->renderer = $dependencies['renderer'];
        // $this->dependencies = $dependencies;
        $this->serviceContainer = new ServiceContainer();
        $this->dispatcher = new Dispatcher();
        $this->router = new Router();
        $this->serviceContainer['settings'] = function ($c) use ($settings) {
            return $settings;
        };
    }

    /**
     * Run the application
     *
     * @return void
     */
    public function run () {

        $this->dispatcher->add(new RouterMiddleware($this->router->getRoutes()));

        $request = new Request($_SERVER);
        $response = $this->dispatcher->dispatch($request, new Response());

        $this->send($request, $response);
    }

    private function send (Request $request, Response $response) {
        foreach ($response->getHeaders() as $header) {
            header ("{$header->getName()}: {$header->getValue()}");
        }

        echo $response->getBody();
    }

    public function add (callable $callback) {
        $this->dispatcher->add($callback);
        return $this;
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
     * Add a new route for POST method
     *
     * @param string $route
     * @param callable $callback
     * @return void
     */
    public function post (string $route, callable $callback) {
        $this->router->registerRoute(
            new Route('POST', $route, $callback)
        );
    }

    /**
     * Add a new route for every HTTP methods
     *
     * @param string $route
     * @param callable $callback
     * @return void
     */
    public function route (string $route, callable $callback) {
        $this->router->registerRoute(
            new Route('any', $route, $callback)
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
            ->setBody($this->serviceContainer['renderer']->render($templateName, $context))
        ;
    }

    /**
     * Returns the application service container
     *
     * @return ServiceContainer
     */
    public function getContainer (): ServiceContainer {
        return $this->serviceContainer;
    }
}