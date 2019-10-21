<?php

require "../class/database.class.php";
require "../class/Secretaire.class.php";
require "../class/SecretaireManager.class.php";

    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require "../class/verification.class.php";
            require "../class/database.class.php";
            
            $verification = new Verifie();
            $bdd = Database::getPDO();

            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $requete = $bdd->prepare('SELECT * FROM users WHERE mail = :mail AND pass = :pass');
            $requete->execute(array(
                    'mail' => $email,
                    'pass' => $password
                ));
            $result = $requete->fetch();

            if (!$result) {
                header("Location: ../../");
            }

            else{
                session_start();
                $_SESSION['id'] = $result->{'id'};

                $role = $result->{'id_role'};
                switch ($role) {
                    case 1:
                        header("Location: ../../admin");
                    break;
                    case 2:
                        header("Location: ../../secretaire");
                    break;
                    case 3:
                        header("Location: ../../medecin");
                    break;
                default:
                    header("Location: ../../");
                }
            }
        }
        else{
            header("Location: ../../");
        }
    }


    if (isset($_POST['ajouter'])) {
        if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw2']) && !empty($_POST['service'])) {
          if ($_POST['psw'] == $_POST['psw2']) {

$secretaire = new Secretaire();
$manager = new SecretaireManager();
              $secretaire->hydrate([
              "nom" => $_POST['lastname'],
              "prenom" => $_POST['firstname'],
              "mail" => $_POST['email'],
              "pass" => $_POST['psw']
            ]);
  
            $manager->add($secretaire);
          }
        }
    }