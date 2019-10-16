<?php 
    session_start();
<<<<<<< HEAD
<<<<<<< HEAD

    if (!isset($_SESSION['id'])) {
        header('Location: ./');
        exit;
    }
=======
/* 
    if (!isset($_SESSION['id']) || $_SESSION['password'] !== 'tonpassword') {
        header('Location: ./');
        exit;
    } */
>>>>>>> 6af24c1eb898bed229b736298c58b8624170b8b2
=======

    if (!isset($_SESSION['id'])) {
        header('Location: ./');
        exit;
    }
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404

    $title = "Tableau de bord";
    $style = "views/css/dashbord.css";
    $form = new Form();
    $pass = "password";

    $bd = Database::getPDO();

    $statement = $bd->query("SELECT service FROM services");
    $services = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($services as $service){
        $tableService[] = implode(', ', array_values($service));
    }
    sort($tableService);

    
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#">
        <img src="views/img/logodj.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <img src="views/img/user.png" class="rounded-circle" alt="">
            </li>
        </ul>
    </div>
</nav>

<div class="row">
    <div class="col-md-2">
        <h3>Admin</h3>
        <ul>
            <a href="#"><li>ADMINISTRATEUR</li></a>
            <a href="#"><li class="active">SECRETAIRES</li></a>
            <a href="#"><li>MEDECINS</li></a>
        </ul>
    </div>
    <div class="col-md-10">
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#lister" aria-expanded="false" aria-controls="collapseExample">
                Lister
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ajouter" aria-expanded="false" aria-controls="collapseExample">
                Ajouter
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#supprimer" aria-expanded="false" aria-controls="collapseExample">
                supprimer
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#editer" aria-expanded="false" aria-controls="collapseExample">
                editer
            </button>
        </p>
        <div class="collapse" id="lister">
            <div class="card card-body">
                <h1>LISTE SECRETAIRES</h1>
            </div>
        </div>
        <div class="collapse" id="ajouter">
            <div class="card card-body">
                <h1>Ajouter un secretaire</h1>
                <form action="">
                    <div class="form-group">
                        <?php
                            echo $form->label("nom", "Nom :");
                            echo $form->input("text", "nom");
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $form->label("prenom", "Prenom :");
                            echo $form->input("text", "prenom");
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $form->label("email", "Adresse mail :");
                            echo $form->input("email", "adresse mail");
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $form->label("Service", "Service :");
                        ?>
                        <select class="custom-select" name="role">
                            <option selected>Selectionner le service du secretaire</option>
                                <?php
                                    for ($i=0; $i < sizeof($tableService); $i++) { 
                                        echo $form->option(($tableService[$i]));
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $form->label($pass, "Mot de passe :");
                            echo $form->input($pass, "Mot de passe");
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $form->label($pass, "Mot de passe :");
                            echo $form->input($pass, "Confirmation du mot de passe");
                        ?>
                    </div>

                    <?php
                        echo $form->submit("valider");
                    ?>

                </form>
                
            </div>
        </div>
        <div class="collapse" id="supprimer">
            <div class="card card-body">
                <h1>SUPPRIMER SECRETAIRES</h1>
            </div>
        </div>
        <div class="collapse" id="editer">
            <div class="card card-body">
                <h1>MODIFIER INFORMATIONS DES SECRETAIRES</h1>
            </div>
        </div>
    </div>
</div>