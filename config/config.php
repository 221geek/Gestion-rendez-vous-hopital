<?php

    require "bddConnect.class.php";

    $pdo = BddConnect::getPDO();

    /* 
        requete
        $statement = $pdo->query(' ... la requete ici ... ');
        $statement->fetchAll();
    */