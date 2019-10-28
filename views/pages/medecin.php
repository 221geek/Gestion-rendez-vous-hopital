<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./index?error=Veillez d\'abord vous connecter');
        exit;
    }
    if ($_SESSION['role'] != 3) {
      header("Location: ./");
    }


    $title = "Dashbord";
    $style = "views/css/dashbord.css";

    $firstname = "medecin";
    $lastname = "Chef";
?>
<div class="head">
    <div class="container">
        <p>Bonjour <?php echo $firstname .' '.$lastname; ?></p>
        <a href="#">Deconnexion</a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="views/img/logodj.png" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Tableau de bord</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">liste des Patients</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Messagerie</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#">Mon profil</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="content container">
    <div class="blocs">
        <div class="flotte">
            <em class="fa fa-calendar-alt"></em>
            <div class="right">
                <p>Rendez-vous</p>
                <button>Cliquer ici</button>
            </div>
        </div>
        <div class="flotte">
            <em class="fa fa-envelope"></em>
            <div class="right">
                <p>Rechercher ou annuler un Rendez-vous</p>
                <button>Cliquer ici</button>
            </div>
        </div>
        <div class="flotte">
            <em class="fa fa-user"></em>
            <div class="right">
                <p>Mon profil</p>
                <button>Cliquer ici</button>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="rv">
            <h3>Horaire des Rendez-vous</h3>
            <em class="fa fa-calendar-alt"></em>
            <button>Cliquer ici</button>
        </div>
        <div class="prochain">
            <h3>Rendez-vous a venir</h3>
            <!-- LISTE DE 5 A 10 PROCHAIN RV A VENIR -->
        </div>
    </div>
</div>