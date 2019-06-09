<?php

namespace App\Renderer\Exception;

/**
 * Called when there is no template found by the _Renderer_.
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class TemplateNotFoundException extends \Exception
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