<?php /* 
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./');
        exit;
    } */

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
                    <a class="nav-link" href="#">Rendez-vous</a>
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
                <p></p>
                <button>Cliquer ici</button>
            </div>
        </div>
        <a href="#">
        <div class="flotte">
            <em class="fa fa-envelope"></em>
            <h2>Secretaire</h2>
        </div>
        </a>
        <div class="flotte">
            <em class="fa fa-user"></em>
            <div class="right">
                <p>Medecins</p>
                <button>Cliquer ici</button>
            </div>
        </div>
    </div>
    <div class="bottom">
    </div>
</div>