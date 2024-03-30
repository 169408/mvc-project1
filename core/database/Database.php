<?php

namespace core\database;

use \PDO;

class Database
{
    private $connect;
    /**
     * PDO
     */
    private $pdo;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}