<?php

namespace App\Validation\Types;

class Phone
{
    private const PHONE_REGEX = '/^[0-9]{10}$/';

    public function __invoke($v)
    {
        return preg_match(self::PHONE_REGEX, $v);
    }
}