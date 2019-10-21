<?php /* 
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./');
        exit;
    } */


    $active = "active";

    $title = "Tableau de bord";
    $style = "views/css/dashbord.css";
    $firstname = "prenom";
    $lastname = "nom";

    $bd = Database::getPDO();

    $statement = $bd->query("SELECT service FROM services");
    $services = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($services as $service){
        $tableService[] = implode(', ', array_values($service));
    }
    sort($tableService);
?>
<div class="head">
    <div class="container-fluid">
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
          <form action="" method="POST" class="ml-auto">
            <ul class="navbar-nav">
              
                <li class="nav-item <?php if (isset($_POST['dashboard'])) { echo $active; }?>">
                    <a class="nav-link" href="#"><button type="submit" name="dashboard">Tableau de bord</button></a>
                </li>

                <li class="nav-item <?php if (isset($_POST['secretaire'])) { echo $active; }?>">
                    <a class="nav-link" href="#"><button type="submit" name="secretaire">Secretaires</button></a>
                </li>

                <li class="nav-item <?php if (isset($_POST['medecin'])) { echo $active; }?>">
                    <a class="nav-link" href="#"><button type="submit" name="medecin">Medecins</button></a>
                </li>

                <li class="nav-item <?php if (isset($_POST['adminlist'])) { echo $active; }?>">
                    <a class="nav-link" href="#"><button type="submit" name="adminlist">Administrateur</button></a>
                </li>

                <li class="nav-item <?php if (isset($_POST['profil'])) { echo $active; }?>">
                    <a class="nav-link " href="#"><button type="submit" name="profil">Mon profil</button></a>
                </li>

              </ul>
          </form>
        </div>
    </div>
</nav>

<?php
  if (isset($_POST['dashboard'])) {
    include("admin/dashboard.php");
  }
  if (isset($_POST['secretaire'])) {
    include("admin/secretaire.php");
  }
  if (isset($_POST['medecin'])) {
    include("admin/medecin.php");
  }
  if (isset($_POST['adminlist'])) {
    include("admin/adminlist.php");
  }
  if (isset($_POST['profil'])) {
    include("admin/profil.php");
  }
?>