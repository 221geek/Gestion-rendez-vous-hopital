<?php /* 
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ./');
        exit;
    } */

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
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">Tableau de bord</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="#">Secretaires</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Medecins</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Administrateur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#">Mon profil</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="crud">
        <div class="entete">
            <h3>Secretaires</h3>
            <div>
                <button class="btn btn-danger"><em class="fa fa-user-minus"></em> Supprimer</button>
                <button class="btn btn-success"><em class="fa fa-user-plus"></em> Ajouter un Secretaire</button>
            </div>
        </div>
        <table class="table" aria-describedby="crud ">
                <thead>
                  <tr>
                    <th scope="col">
                        <input type="checkbox">
                    </th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                        <input type="checkbox">
                    </th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <em class="fa fa-edit"></em>
                        <em class="fa fa-trash-alt"></em>
                    </td>
                  </tr>
                  <tr>
                </tbody>
              </table>
    </div>
</div>