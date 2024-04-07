<?php

namespace models;

use core\database\Database;
use MongoDB\BSON\Type;

class fileModel
{
    private Database $db;
    private $file_id;
    private $file_name;
    private $created_at;
    private $post_id;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createFile($params) {
        $this->db->query("INSERT INTO files (file_name, created_at, post_id) VALUES (?, ?, ?);", $params);
    }

    public function readAll() {
        return $this->db->query("SELECT * FROM files;")->fetchAll();
    }

    public function loadFile($file, $post_id) {
        $type = $file["type"];
        $num = 0;
        for ($i = 0; $i < strlen($type); $i++) {
            if($type[$i] === "/") {
                $num = $i + 1;
            }
        }
        $name = md5(microtime()) . "." . substr($type, $num);
        $this->file_name = $name;
        $this->created_at = date("d.m.y");
        $dir ="uploads/post_files/";
        $uploadfile = $dir . $this->file_name;
        $this->post_id = $post_id;

        if(move_uploaded_file($file["tmp_name"], $uploadfile)) {
            $this->createFile([$this->file_name, $this->created_at, $this->post_id]);
        }
    }
}