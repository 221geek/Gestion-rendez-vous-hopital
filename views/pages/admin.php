<?php 
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./index?error=Veillez d\'abord vous connecter');
        exit;
    }
    if ($_SESSION['role'] != 1) {
      header("Location: ./");
    }

    $title = "Tableau de bord";
    $style1 = "views/css/nav.css";
    $style2 = "views/css/dashbord.css";

    $tableService = array();
    $tableSpe = array();
    
    $bd = Database::getPDO();
    
    $statement1 = $bd->query("SELECT * FROM services");

    while($donnees = $statement1->fetch()){
        $tableService[] = $donnees;
    }

    $statement2 = $bd->query("SELECT * FROM specialites");

    while($donnees = $statement2->fetch()){
      $tableSpe[] = $donnees;
    }

?>
<div class="head">
    <div class="container-fluid">
        <p>Bonjour</p>
        <a href="app/config/deconnexion.php">Deconnexion</a>
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
            <li class="navbar-item">
              <a href="admin?include=dashboard" class="nav-link">Tableau de bord</a>
            </li>
            <li class="navbar-item">
              <a href="admin?include=secretaire" class="nav-link">Secretaires</a>
            </li>
            <li class="navbar-item">
              <a href="admin?include=medecin" class="nav-link">Medecins</a>
            </li>
            <li class="navbar-item">
              <a href="admin?include=admin" class="nav-link">Administrateur</a>
            </li>
          </ul>
        </div>
    </div>
</nav>
<div class="container">
  <?php
  if (isseT($_REQUEST['include'])) {

      $include = $_REQUEST['include'];

      if ($include == "dashboard" || $include == "") {
          include("admin/dashboard.php");
      }
      if ($include == "secretaire") {
          include("admin/secretaire.php");
      }
      if ($include == "medecin") {
          include("admin/medecin.php");
      }
      if ($include == "admin") {
          include("admin/adminlist.php");
      }
  }
  else{
      include("admin/dashboard.php");
  }
    
  ?>
</div>