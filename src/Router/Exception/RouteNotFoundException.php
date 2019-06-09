<?php

namespace App\Router\Exception;

/**
 * Throw when no route was found by the router middleware.
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class RouteNotFoundException extends \Exception
{
    /**
     * {@inheritDoc}
     */
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);    
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}