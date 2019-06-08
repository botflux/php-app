<?php

namespace App\Validation\Types;

class Required
{
    public function __invoke($v)
    {
        return isset($v);
    }
}