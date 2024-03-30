<?php

namespace models;

class addPost
{
    /**
     * @var PDO $pdo
     */
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createPost($params) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");

        $stmt->execute($params["title"], $params["content"]);


    }

}