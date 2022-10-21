<?php

namespace App\Models;

use App\Core\BasicModel;

class CityModel extends BasicModel
{

    public string $table = 'city';
    protected array $fillable = ['name', 'zipCode'];


    public function save()
    {
        $stm = $this->pdo->prepare("INSERT INTO city(id, name) VALUES (NULL,:name)");
        $name = $this->name;
        $stm->bindParam(':name', $name);
        return $stm->execute();
    }


    public function existCityWithZipCode($cityName, $zipCode)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE name=:name AND zipCode=:zipCode');
        $stm->bindParam(':name', $cityName, \PDO::PARAM_STR);
        $stm->bindParam(':zipCode', $zipCode, \PDO::PARAM_STR);
        $stm->execute();
        if ($stm->fetchColumn()) {
            return true;
        }

        return false;
    }


    public function getAllCitiesWhereLike($value): array
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE zipCode LIKE :value ORDER BY name ASC');
        $param = '%'.$value.'%';
        $stm->bindParam(':value', $param, \PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


}