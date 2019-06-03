<?php

namespace App\Router;

/**
 * Represents an HTTP Request
 */
class Request extends HttpBase {
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $get;

    public function __construct(array $server, array $post, array $get)
    {  
        $this->uri = $server['REQUEST_URI'];
        $this->method = $server['REQUEST_METHOD'];
        $this->post = $post;
    }

    /**
     * Returns true if a field with name _$name_ was sent otherwise false.
     *
     * @param string $name
     * @return boolean
     */
    public function hasField (string $name): bool {
        return isset($this->post[$name]);
    }

    /**
     * Returns field with the name _$name_.
     *
     * @param string $name
     * @return any
     */
    public function getField (string $name) {
        if (!$this->hasField($name)) return null;

        return $this->post[$name];
    }

    /**
     * Returns true if a get param with name _$name_ was sent otherwise false.
     *
     * @param string $name
     * @return boolean
     */
    public function hasQueryParam (string $name): bool {
        return isset($this->get[$name]);
    }

    /**
     * Returns the get param with the name _$name_.
     *
     * @param string $name
     * @return void
     */
    public function getQueryParam (string $name) {
        if (!$this->hasQueryParam($name)) return null;

        return $this->get[$name];
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