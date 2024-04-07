<?php

namespace models;

use core\database\Database;

class postModel
{

    private Database $db;
    private $post_id;
    private $title;
    private $content;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createPost($params) {
        $this->db->query("INSERT INTO posts (title, content) VALUES (?, ?)", $params);
    }

    public function readAll() {
        return $this->db->query("SELECT * FROM posts;")->fetchAll();
    }

    public function readById($params) {
        return $this->db->query("SELECT * FROM posts WHERE post_id = ?;", $params)->fetchAll();
    }

    public function readBy($params) {
        $query_str = "SELECT * FROM posts WHERE ";
        foreach ($params as $key => $value) {
            if(array_keys($params)[0] != $key) {
                $query_str = $query_str . " and ";
            }
            $query_str = $query_str . "$key = :$key";
        }
        return $this->db->query($query_str, $params)->fetchAll();
    }

}