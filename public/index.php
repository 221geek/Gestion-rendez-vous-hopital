<?php

    $url = $_SERVER["REQUEST_URI"];

    define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views/');

    function afficher($page){
        ob_start();
        require VIEWS .'/pages/' . $page . '.php';
        $content = ob_get_clean();
        $content;
        require_once(VIEWS . 'layout.php');
    }

    require "../app/config/config.php";
    require "../app/Controller.php";
<<<<<<< HEAD
<<<<<<< HEAD
    require "../app/Router.php";
=======
    require "../app/Router.php";

>>>>>>> 6af24c1eb898bed229b736298c58b8624170b8b2
=======
    require "../app/Router.php";
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404
