<?php

namespace App\Http;

class Request {
    /**
     * The request URI
     * 
     * @var string
     */
    private $uri;

    /**
     * The request method
     * 
     * @var string
     */
    private $method;

    /**
     * An array with every get params
     * 
     * @var array
     */
    private $getParams;

    /**
     * An array with every post params
     * 
     * @var array
     */
    private $postParams;

    private $server;

    public function __construct(array $server, array $get, array $post)
    {
        $this->uri = $server['REQUEST_URI'];
        $this->method = $server['REQUEST_METHOD'];
        $this->getParams = $get;
        $this->postParams = $post;
        $this->server = $server;
    }

    /**
     * Returns true if the request has a _$key_ parameter.
     * 
     * @param string $key
     * @return bool
     */
    public function hasParam (string $key) 
    {
        return isset ($this->getParams[$key]);
    }

    /**
     * Returns the parameter named _$key_.
     * 
     * @param string $key
     * @return bool
     */
    public function getParam (string $key) 
    {
        return $this->getParams[$key];
    }

    /**
     * Returns true if the request has field named _$key_ otherwise false.
     * 
     * @param string $key
     * @return bool
     */
    public function hasField (string $key) 
    {
        return isset ($this->postParams[$key]);
    }

    public function getField (string $key) {
        return $this->postParams[$key];
    }

    /**
     * Get the request URI
     *
     * @return  string
     */ 
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get the request method
     *
     * @return  string
     */ 
    public function getMethod()
    {
        return $this->method;
    }
}