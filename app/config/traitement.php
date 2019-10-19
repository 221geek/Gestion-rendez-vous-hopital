<?php

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
            /*  */
        }
    }