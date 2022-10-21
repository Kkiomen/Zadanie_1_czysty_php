<?php

namespace App\Validator;

class RequestMethodValidator
{
    public static function validate(string $method)
    {
        return $_SERVER['REQUEST_METHOD'] == $method;
    }
}