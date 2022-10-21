<?php

namespace App\Core;

abstract class Session
{
    public static function get(string $key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
        return $value;
    }

    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function clear(): void
    {
        session_unset();
    }

    public static function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
}