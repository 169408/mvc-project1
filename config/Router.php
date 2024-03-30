<?php

namespace config;

class Router
{
    private $routes = [
        "" => "home.php",
        "home" => "home.php",
        "about" => "about.php",
        "contact" => "contact.php",
        "addPost" => "add_post.php"
    ];

    private $url = "";

    public function __construct($url)
    {
        $this->url = trim(parse_url($url)["path"], "/");
    }

    public function showview() {
        foreach ($this->routes as $key => $route) {
            if($this->url === $key) {
                return CONTROLLERS . "/$route";
            }
        }
        return abort();
    }


}