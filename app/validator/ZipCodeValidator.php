<?php

namespace App\Validator;

class ZipCodeValidator
{
    const PATTERN = "/^[0-9]{2}-[0-9]{3}$/";

    public static function validate(string $value): bool
    {
        return preg_match(self::PATTERN, $value);
    }
}