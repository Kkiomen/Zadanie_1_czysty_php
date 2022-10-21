<?php

namespace App\Validator;

use App\Core\Alert;
use App\Core\AlertStatus;
use App\Core\Redirect;
use App\Core\Session;

class CityValidator
{

    const VALUE_GREATHER_THAN = MIN_LENGTH_CITY_NAME;
    const VALUE_LESS_THAN = MAX_LENGTH_CITY_NAME;

    public static function validate($value)
    {

        if (is_null($value) || empty($value)) {
            Alert::make(AlertStatus::DANGER, 'Wartość miasta, nie może być pusta');
            return false;
        }

        if (!RequestMethodValidator::validate('POST')) {
            Alert::make(AlertStatus::DANGER, 'Nieprawidłowe żądanie');
            return false;
        }

        if (!LengthValidator::valueGreaterThan($value, self::VALUE_GREATHER_THAN)) {
            Alert::make(AlertStatus::DANGER, 'Nazwa miasta musi być dłuższa niż ' . self::VALUE_GREATHER_THAN);
            return false;
        }

        if (!LengthValidator::valueLessThan($value, self::VALUE_LESS_THAN)) {
            Alert::make(AlertStatus::DANGER, 'Nazwa miasta musi być krótsza niż ' . self::VALUE_LESS_THAN);
            return false;
        }

        return true;
    }
}