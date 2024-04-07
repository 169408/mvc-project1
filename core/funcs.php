<?php

function dump($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data) {
    dump($data);
    die;
}

function print_arr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function redirect($url = "") {
    if($url) {
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "darkempire/home";
    }
    header("Location: $redirect");
    die;
}

function abort($code=404) {
    http_response_code($code);
    return VIEWS . "/errors/{$code}.tpl.php";
}
