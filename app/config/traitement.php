<?php
session_start();

    require "../class/verification.class.php";
    require "../class/database.class.php";
    
    $verification = new Verifie();
    $bdd = Database::getPDO();

    $role = $_POST['role'];
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    
    $requete = $bdd->prepare('SELECT id FROM administrateur WHERE mail = :mail AND pass = :pass');
        $requete->execute(array(
            'mail' => $email,
            'pass' => $password
        ));
    $result = $requete->fetch();

    if(!$result){
        header('Location: ../../');
    }
    else{
        $_SESSION['id'] = $result['id'];
        $_SESSION['mail'] = $email;
    }