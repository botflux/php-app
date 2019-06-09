<?php

namespace App\Router;

/**
 * Represents an HTTP Response
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class Response extends HttpBase
{
    /**
     * @var string
     */
    private $body;

    /**
     * Get the value of body
     *
     * @return  string
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @param  string  $body
     *
     * @return  self
     */ 
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }
}