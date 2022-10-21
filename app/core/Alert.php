<?php

namespace App\Core;

class Alert
{

    public static function make(AlertStatus $status, string $message): void
    {
        Session::set('alert', [
            'status' => $status->getStatus(),
            'message' => $message
        ]);
    }

    public static function clearAlert()
    {
        Session::remove('alert');
    }

}