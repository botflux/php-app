<?php

namespace App\Router;

class Response
{
    /**
     * @var Header[]
     */
    private $headers;

    /**
     * @var string
     */
    private $body;

    /**
     * @return Header[]
     */
    public function getHeaders (): array {
        return $this->headers;
    }

    /**
     * @return Header|null
     */
    public function getHeader (string $name): ?Header {
        if ($key = array_search($name, $this->headers)) {
            return $this->headers[$key];
        }

        return null;
    }

    /**
     * @var string $name
     */
    public function hasHeader (string $name): bool {
        return array_reduce($this->headers, function ($prev, Header $h) use ($name) {
            if ($h->getName() === $name) {
                return true;
            }

            return $prev;
        }, false);
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setHeader (string $name, string $value): self {
        $this->headers[] = new Header($name, $value);

        return $this;
    }

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