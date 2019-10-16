<?php

    if (isset($_POST['submit'])){
<<<<<<< HEAD

        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {

            require "../class/verification.class.php";
            require "../class/database.class.php";
            
            $verification = new Verifie();
            $bdd = Database::getPDO();

            $role = $_POST['role'];
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $requete = $bdd->prepare('SELECT id FROM users WHERE mail = :mail AND pass = :pass');
            $requete->execute(array(
                    'mail' => $email,
                    'pass' => $password
                ));
            $result = $requete->fetch();

            if (!$result) {
                header("Location: ../../");
            } else {
                session_start();

                $_SESSION['id'] = $result->{'id'};
                $_SESSION['mail'] = $email;

                if ($role == "administrateur") {
                    header('Location: ../../admin');
                }
            }
        }
        else{
            header('Location: ../../');
=======
        require "../class/verification.class.php";
        require "../class/database.class.php";
        
        $verification = new Verifie();
        $bdd = Database::getPDO();

        $role = $_POST['role'];
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $requete = $bdd->prepare('SELECT id FROM administrateur WHERE mail = :mail AND password = :pass');
        $requete->execute(array(
                'mail' => $email,
                'pass' => $password
            ));
        $result = $requete->fetch();

        if (!$result) {
            header('Location: ../../');
        } else {
            session_start();

            $_SESSION['id'] = $result->{'id'};
            $_SESSION['mail'];

            if ($role = "administrateur") {
                header('Location: ../../admin');
            }
            else{
                echo "ok";
            }
>>>>>>> 6af24c1eb898bed229b736298c58b8624170b8b2
        }
    }
    else{
        header('Location: ../../');
    }