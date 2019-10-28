<?php

require "../class/database.class.php";
require "../class/Secretaire.class.php";
require "../class/SecretaireManager.class.php";
require "../class/Medecin.class.php";
require "../class/MedecinManager.class.php";

$secretaire = new Secretaire();
$manager = new SecretaireManager();

$medecin = new Medecin();
$medecinManager = new MedecinManager();

if (isset($_POST['addsecretaire'])) {
    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw2']) && !empty($_POST['service'])) {
        if ($_POST['psw'] == $_POST['psw2']) {

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

if (isset($_POST['deletesecretaire'])) {

    $secretaire->setMail($_POST['mail']);
    $manager->delete($secretaire);
    header("Location: ../../admin?include=secretaire");
}

if (isset($_POST['deletesecretairecheckbox'])) {
    if (!empty($_POST['check'])) {
        $mails = $_POST['check'];
        $arrayMail = explode(",", $mails);
        for ($i=0; $i < sizeof($arrayMail); $i++) { 
            $secretaire->setMail($arrayMail[$i]);
            $manager->delete($secretaire);
        }
        header("Location: ../../admin?include=secretaire");
    }
}

if (isset($_POST['editSec'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw2']) && isset($_POST['service'])) {
        $secretaire->hydrate([
            "nom" => $_POST['lastname'],
            "prenom" => $_POST['firstname'],
            "mail" => $_POST['email'],
            'pass' => $_POST['psw'],
            "service" => $_POST['service']
        ]);

        $manager->update($secretaire);
        header("Location: ../../admin?include=secretaire");
    }
}

if (isset($_POST['addMedecin'])) {
    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw2']) && !empty($_POST['service']) && !empty($_POST['specialite'])) {
        $medecin->hydrate([
            "nom" => $_POST['lastname'],
            "prenom" => $_POST['firstname'],
            "mail" => $_POST['email'],
            'pass' => $_POST['psw'],
            "service" => $_POST['service'],
            "specialite" => $_POST['specialite']
        ]);
        $medecinManager->add($medecin);

        header("Location: ../../admin?include=medecin");
    }
}

if (isset($_POST['deleteMedecin'])) {
    
    $medecin->setMail($_POST['mail']);
    $medecinManager->delete($medecin);
    header("Location: ../../admin?include=medecin");
}

if (isset($_POST['deletemedecincheckbox'])) {
    if (!empty($_POST['check'])) {
        $mails = $_POST['check'];
        $arrayMail = explode(",", $mails);
        for ($i=0; $i < sizeof($arrayMail); $i++) { 
            $medecin->setMail($arrayMail[$i]);
            $medecinManager->delete($medecin);
        }
        header("Location: ../../admin?include=medecin");
    }
}