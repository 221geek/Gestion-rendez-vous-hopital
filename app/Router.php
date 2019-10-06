<?php

    $controller = new Controller();

    if ($url == "/hopital/") {
        $controller->index();
    }
    else{
        $controller->error();
    }