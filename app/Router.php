<?php

    $controller = new Controller();

    switch ($url){

        case "/hopital/":
            $controller->index();
        break;

        case "/hopital/admin":
        case "/hopital/admin?include=dashboard":
        case "/hopital/admin?include=admin":
        case "/hopital/admin?include=secretaire":
        case "/hopital/admin?include=medecin":
        case "/hopital/admin?include=profil":
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