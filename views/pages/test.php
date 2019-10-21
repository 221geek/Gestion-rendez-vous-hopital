<?php

    $title = "tests";

    $table = array();
    $bdd = Database::getPDO();

    $req = $bdd->query("SELECT * FROM users");

    while ($donnees = $req->fetch()) {
        $table[] = $donnees;
    }
    var_dump($table[2]);