<?php

    if (isset($_POST['submit'])){
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
        }
    }
    else{
        header('Location: ../../');
    }