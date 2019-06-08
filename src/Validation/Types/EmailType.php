<?php

namespace App\Validation\Types;

/**
 * Check if email is valid
 */
class EmailType
{
    private const EMAIL_REGEX = '/^(.+)@(.+)\\.(.+)$/';

    public function __invoke($v): bool
    {
        return preg_match(self::EMAIL_REGEX, $v);
    }
}