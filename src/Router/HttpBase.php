<?php

namespace App\Router;

/**
 * Base class for Response and Request
 */
abstract class HttpBase 
{
    /**
     * @var Header[]
     */
    protected $headers;

    /**
     * Returns an array containing Header
     * 
     * @return Header[]
     */
    public function getHeaders (): array {
        return $this->headers;
    }

    /**
     * Returns the header that match the passed _$name_.
     * If there is no header found, null is returned.
     * 
     * @param string $name
     * @return Header|null
     */
    public function getHeader (string $name): ?Header {
        if ($key = array_search($name, $this->headers)) {
            return $this->headers[$key];
        }

        return null;
    }

    /**
     * Returns true if an header matchs the passed _$name_ otherwise false.
     * 
     * @var string $name
     * @return bool
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
     * Set a header
     * 
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setHeader (string $name, string $value): self {
        $this->headers[] = new Header($name, $value);

        return $this;
    }
}