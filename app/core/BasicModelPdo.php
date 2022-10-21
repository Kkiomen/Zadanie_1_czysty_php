<?php

namespace App\Core;

class BasicModelPdo
{

    protected $pdo;

    public function __construct()
    {
        $db = DB::getInstance();
        $this->pdo = $db->getConnection();
    }


    public function getAll(): array
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY name ASC');
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteById($id): bool
    {
        if ($this->existElementById($id)) {
            $stm = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE id=:id');
            $stm->bindParam(':id', $id, \PDO::PARAM_INT);
            $stm->execute();
            return true;
        }

        return false;
    }

    protected function getById(int $id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function existElementById(int $id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        $stm->execute();
        if ($stm->fetchColumn()) {
            return true;
        }
        return false;
    }
}