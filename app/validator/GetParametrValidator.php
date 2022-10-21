<?php

namespace App\Validator;

use App\Core\Alert;
use App\Core\AlertStatus;

class GetParametrValidator
{

    public static function validate($nameParam)
    {
        if (!isset($_GET[$nameParam])) {
            Alert::make(AlertStatus::DANGER, 'Niepoprawna wartość parametru ' . $nameParam);
            return false;
        }
        return true;
    }
}