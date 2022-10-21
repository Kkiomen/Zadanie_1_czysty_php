<?php

namespace App\Core;

class Pagination
{
    const LIMIT = PAGINATION_LIMIT;
    public int $page = 1;
    public int $totalPages = 1;
    private $pdo;
    private $collection;

    public function __construct($collection)
    {
        $db = DB::getInstance();
        $this->pdo = $db->getConnection();
        $this->collection = $collection;
        $this->page = $this->getPageNumber();
        $this->totalPages = $this->getTotalPages($this->collection);
    }

    private function getPageNumber(): int
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        return $page;
    }

    private function getTotalPages($collection): int
    {
        return ceil(count($collection) / self::LIMIT);
    }

    public function getAll()
    {
        $starting_limit = intval(($this->page - 1) * self::LIMIT);
        $limit = intval(self::LIMIT);

        $resultCollection = $this->collection;
        return array_slice($resultCollection, $starting_limit, $limit);
    }

}