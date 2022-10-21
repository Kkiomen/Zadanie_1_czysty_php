<?php

namespace App\Core;

abstract class Redirect
{

    public static function backUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }
}