<?php

require_once "../config/constants.php";
require ROOT . "/vendor/autoload.php";

require_once CORE . "/funcs.php";

$database = \core\database\Database::getInstance("127.0.0.1", "darkempire", "root", "ioskillMy_bra1n");

$router = new \config\Router($_SERVER["REQUEST_URI"]);

$validator = new \config\Validator();

require_once $router->showview();
