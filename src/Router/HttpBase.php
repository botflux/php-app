<?php

namespace App\Router;

abstract class HttpBase 
{
    /**
     * @var Header[]
     */
    protected $headers;

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
}