<?php

namespace App\Validation\Types;

class Length
{
    /**
     * Min length
     *
     * @var int
     */
    private $minLength;

    /**
     * Max length
     *
     * @var int
     */
    private $maxLength;

    public function __construct(int $minLength, int $maxLength)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    public function __invoke($value): bool
    {
        $c = strlen($value);

        if ($c >= $this->minLength && $c <= $this->maxLength) {
            return true;
        }

        return false;
    }
}