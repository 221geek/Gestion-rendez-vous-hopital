<?php
if (isset($_POST['ajouter'])) {
    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw2']) && !empty($_POST['service'])) {
      if ($_POST['psw'] == $_POST['psw2']) {

            require "../class/database.class.php";
            require "../class/Secretaire.class.php";
            require "../class/SecretaireManager.class.php";

            $secretaire = new Secretaire();
            $manager = new SecretaireManager();
            $secretaire->hydrate([
            "nom" => $_POST['lastname'],
            "prenom" => $_POST['firstname'],
            "mail" => $_POST['email'],
            "pass" => $_POST['psw'],
            "service" => $_POST['service']
        ]);

        $manager->add($secretaire);

        header("Location: ../../admin?include=secretaire");
      }
    }
}

if (isset($_POST['essai'])) {
    echo $_POST['mail'];

    $
}