<?php

namespace App\Router;

class Request {
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $method;

    public function __construct(array $server)
    {  
        $this->uri = $server['REQUEST_URI'];
        $this->method = $server['REQUEST_METHOD'];
    }

    /**
     * Get the value of uri
     *
     * @return  string
     */ 
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set the value of uri
     *
     * @param  string  $uri
     *
     * @return  self
     */ 
    public function setUri(string $uri) : self
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get the value of method
     *
     * @return  string
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @param  string  $method
     *
     * @return  self
     */ 
    public function setMethod(string $method) : self
    {
        $this->method = $method;

        return $this;
    }
}