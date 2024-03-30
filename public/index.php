<?php

require_once "../config/constants.php";

require ROOT . "/vendor/autoload.php";

require_once CORE . "/funcs.php";

$database = new \core\database\Database("127.0.0.1", "darkempire", "root", "ioskillMy_bra1n");
$pdo = $database->getPdo();


$router = new \config\Router($_SERVER["REQUEST_URI"]);

require_once $router->showview();



