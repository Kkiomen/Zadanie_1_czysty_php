<?php

namespace App\Core;

use App\Core\Singleton;
use Exception;

abstract class BasicModel extends BasicModelPdo
{


    public string $table;
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public abstract function save();

    public function getElementById($id)
    {
        $values = $this->getById($id);

        if ($this->existElementById($id)) {
            $this->toModel($values);
            $this->setId($id);
            return $this;
        }

        return null;
    }

    public function toModel(array $values)
    {
        foreach ($values as $key => $val) {
            $this->$key = $val;
        }
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET';

        foreach ($this->fillable as $columnName) {
            $query .= ' ' . $columnName . ' = :' . $columnName . ',';
            $values[':' . $columnName] = $this->$columnName;
        }
        $query = substr($query, 0, -1) . ' WHERE id = ' . $this->getId() . ';';

        $stm = $this->pdo->prepare($query);
        $stm->execute($values);
    }

}