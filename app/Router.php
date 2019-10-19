<?php

    $controller = new Controller();

    switch ($url){

        case "/hopital/":
            $controller->index();
        break;

        case "/hopital/admin":
            $controller->admin();
        break;

        case "/hopital/secretaire":
            $controller->secretaire();
        break;

        case "/hopital/test":
            $controller->test();
        break;

        default:
            $controller->error();
    }