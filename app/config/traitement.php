<?php

require "../class/database.class.php";

    if (isset($_POST['login'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require "../class/verification.class.php";
            
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
                $req = $bdd->prepare("SELECT * FROM users WHERE mail = :mail");
                $req->execute(array(
                    'mail' => $email
                ));
                $mailExixst = $req->fetch();
                if (!$mailExixst) {
                    header("Location: ../../index?error=Adresse mail incorrect");
                }
                else {
                    header("Location: ../../index?error=Mot de passe incorrect");
                }
            }

            else{
                session_start();
                $_SESSION['id'] = $result->{'id'};
                $_SESSION['nom'] = $result->{'nom'};
                $_SESSION['prenom'] = $result->{'prenom'};
                $_SESSION['mail'] = $result->{'mail'};
                $_SESSION['role'] = $result->{'id_role'};

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
            header("Location: ../../index?error=Veillez remplir tout les champs");
        }
    }
    else{
        header("Location: ../../");
    }