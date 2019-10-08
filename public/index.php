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

    require "../app/Controller.php";
    require "../app/Router.php";
    require "../app/config/config.php";

