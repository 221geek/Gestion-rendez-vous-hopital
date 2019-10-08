<?php
/* CONNEXION A LA BASE DE DONNEES */
    try {
        $dns = 'mysql:host=localhost;dbname=rendezVous';
        $utilisateur = 'root';
        $motDePasse = 'root';
        $connection = new PDO( $dns, $utilisateur, $motDePasse );
    }
    catch ( Exception $e ) {
        echo "Connection à MySQL impossible : ", $e->getMessage();
        die();
    }


