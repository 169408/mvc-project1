<?php

$title = "BLOG::ABOUT";

$postModel = new \models\postModel($database);
$fileModel = new \models\fileModel($database);

if(isset($_POST) && !empty($_POST)) {
    if($_POST["submit"] == "postAdd") {
        $params = [$_POST["title"], $_POST["content"]];
        $postModel->createPost($params);
        if(isset($_FILES) && !empty($_FILES)) {
            $posts = ($postModel->readBy(["title" => $_POST["title"]]));
            $post_id = $posts[0]["post_id"];
            $files = [];
            $keysg = array_keys($_FILES["uploads"]);
            for($j = 0; $j < count($_FILES["uploads"][$keysg[0]]); $j++) {
                $file = [];
                for($i = 0; $i < count($_FILES["uploads"]); $i++) {
                    $file += ["$keysg[$i]" => $_FILES["uploads"][$keysg[$i]][$j]];
                }
                array_push($files, $file);
            }
            foreach ($files as $file) {
                $fileModel->loadFile($file, $post_id);
            }
        }

        redirect("/about");
    }
}
if (isset($_GET) && !empty($_GET)) {
    if(isset($_GET["submit"]) && $_GET["submit"] == "search") {
        $params = ["title" => $_GET["title"]];
        $searched_posts = $postModel->readBy($params);
    }
}

$posts = $postModel->readAll();
$files = $fileModel->readAll();

require_once VIEWS . "/about.tpl.php";
