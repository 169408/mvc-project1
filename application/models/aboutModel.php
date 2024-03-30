<?php

namespace models;

class aboutModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function readAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM posts;");
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }


}