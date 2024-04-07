<?php

namespace core\database;

use \PDO;

class Database
{
    private $connect;
    private \PDOStatement $stmt;
    private static $instance = null;

    private function __construct($host, $dbname, $user, $password)
    {
        //$dns = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            return $this;
        } catch (\PDOException $exception) {
            echo "DB error: {$exception->getMessage()}";
            die;
        }
    }

    public static function getInstance($host, $dbname, $user, $password) {
        if(self::$instance === null) {
            self::$instance = new self($host, $dbname, $user, $password);
        }
        return self::$instance;
    }

    public function getConnect()
    {
        return $this->connect;
    }

    public function query($query_str, $params = []) {
        $this->stmt = $this->connect->prepare($query_str);
        $this->stmt->execute($params);
        return $this->stmt;
    }


}