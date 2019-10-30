<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./index?error=Veillez d\'abord vous connecter');
        exit;
    }
    if ($_SESSION['role'] != 2) {
      header("Location: ./");
    }

    $title = "Dashbord";
    $style = "views/css/nav.css";
    $style1 = "views/css/fullcalendar.css";


    $firstname = $_SESSION['prenom'];
    $lastname = $_SESSION['nom'];


	$bdd = new PDO('mysql:host=localhost;dbname=rendezVous;charset=utf8', 'root', 'root');

?>
<div class="head">
    <div class="container-fluid">
        <p>Bonjour <?php echo $firstname .' '.$lastname; ?> </p>
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

                <li class="nav-item active">
                    <a class="nav-link" href="secretaire?include=dashboard">Tableau de bord</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="secretaire?include=rendezvous">Rendez-vous</a>
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

<?php
if (isseT($_REQUEST['include'])) {

    $include = $_REQUEST['include'];

    if ($include == "dashboard" || $include == "") {
        include("secretaire/dashboard.php");
    }
    if ($include == "rendezvous") {
        include("secretaire/rendezvous.php");
    }
}
else{
    include("secretaire/dashboard.php");
}

?>