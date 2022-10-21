<?php

namespace App\Validator;

class LengthValidator
{

    public static function valueGreaterThan(string $value, int $number): bool
    {
        return strlen($value) > $number;
    }

    public static function valueLessThan(string $value, int $number): bool
    {
        return strlen($value) < $number;
    }
}