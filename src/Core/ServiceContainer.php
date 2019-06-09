<?php

namespace App\Core;

/**
 * Application service container
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class ServiceContainer implements \ArrayAccess
{
    private $container = [];

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset]->get() : null;
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetSet($offset, $value)
    {
        if (!is_callable($value)) {
            throw new \Exception('Service must be a function');
        }

        if (is_null($offset)) {
            $this->container[] = new Service($value, $this);
        } else {
            $this->container[$offset] = new Service($value, $this);
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}