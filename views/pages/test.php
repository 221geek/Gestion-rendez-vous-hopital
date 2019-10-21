<?php

    $title = "tests";

    $table = array();
    $bdd = Database::getPDO();

    require "../app/class/Medecin.class.php";
    require "../app/class/MedecinManager.class.php";

    $s = new Medecin();

    $s->hydrate(array[
        
    ]);