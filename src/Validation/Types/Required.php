<?php

namespace App\Validation\Types;

/**
 * Validate if the value is set or not
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class Required
{
    public function __invoke($v)
    {
        return isset($v);
    }
}