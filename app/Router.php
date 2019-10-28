<?php

    $controller = new Controller();

    switch ($url){

        case "/hopital/":
        case (stripos($url, "/hopital/index?error")):
            $controller->index();
        break;

        case "/hopital/admin":
        case (stripos($url, '/hopital/admin?')):
            $controller->admin();
        break;

        case "/hopital/secretaire":
        case (stripos($url, '/hopital/secretaire?')):
            $controller->secretaire();
        break;

        case "/hopital/medecin":
            $controller->medecin();
        break;

        case "/hopital/test":
            $controller->test();
        break;

        default:
            $controller->error();
    }