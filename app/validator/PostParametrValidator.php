<?php

namespace App\Validator;

use App\Core\Alert;
use App\Core\AlertStatus;

class PostParametrValidator
{
    public static function validate($nameParam)
    {
        if (!isset($_POST[$nameParam])) {
            Alert::make(AlertStatus::DANGER, 'Niepoprawna wartość parametru ' . $nameParam);
            return false;
        }

        if (is_null($_POST[$nameParam]) || empty($_POST[$nameParam]) || $_POST[$nameParam] == '') {
            Alert::make(AlertStatus::DANGER, 'Wartość parametru ' . $nameParam . ' nie może być pusta');
            return false;
        }

        return true;
    }
}