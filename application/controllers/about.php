<?php

$title = "BLOG::ABOUT";



$aboutModel = new \models\aboutModel($pdo);
$posts = $aboutModel->readAll();

require_once VIEWS . "/about.tpl.php";
