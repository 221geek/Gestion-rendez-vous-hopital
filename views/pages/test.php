<?php

    $title = "tests";
    require "../app/class/Secretaire.class.php";
    require "../app/class/SecretaireManager.class.php";

    $s = new Secretaire();

    $s->hydrate([
        "nom" => "dioppp",
        "prenom" => "ndoumbe",
        "mail" => "draggon@denerys.com",
        "pass" => "nohiusikkm"
    ]);
    
    $manager = new SecretaireManager();
    $manager->add($s);