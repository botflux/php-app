<?php

namespace App\Validation\Types;

/**
 * Validate a phone number
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class Phone
{
    private const PHONE_REGEX = '/^[0-9]{10}$/';

    public function __invoke($v)
    {
        return preg_match(self::PHONE_REGEX, $v);
    }
}