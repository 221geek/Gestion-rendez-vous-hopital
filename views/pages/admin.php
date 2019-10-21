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
    $table = array();
    $ServiceSecretaire = array();

    $bd = Database::getPDO();

    $statement = $bd->query("SELECT service FROM services");
    $services = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($services as $service){
        $tableService[] = implode(', ', array_values($service));
    }
    sort($tableService);

    $req = $bd->query("SELECT * FROM users WHERE id_role=2");

    while ($donnees = $req->fetch()) {
        $table[] = $donnees;
    }
    for ($i=0; $i < sizeof($table); $i++) {
        $req2 = $bd->query("SELECT service FROM services,secretaires WHERE services.id = secretaires.id_services AND secretaires.id=".$table[$i]->{'id'});
        $serv = $req2->fetch();
        $ServiceSecretaire[$i] = $serv;
    }
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
        <div class="entete bg-dark">
            <h3>Secretaires</h3>
            <div>
                <button class="btn btn-danger"><em class="fa fa-user-minus"></em> Supprimer</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#ajouter"><em class="fa fa-user-plus"></em> Ajouter un Secretaire</button>
            </div>
        </div>
        <table class="table table-dark" aria-describedby="crud">
            <thead>
                <tr>
                    <th scope="col">
                        <input class="" type="checkbox">
                    </th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Service</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
                <tbody>
                    <?php for ($i=0; $i < sizeof($table); $i++) { ?>
                    <tr>
                        <th scope="row">
                            <input class="" type="checkbox">
                        </th>
                        <td><?php echo $table[$i]->{'nom'} ?></td>
                        <td><?php echo $table[$i]->{'prenom'} ?></td>
                        <td><?php echo $table[$i]->{'mail'} ?></td>
                        <td><?php echo $ServiceSecretaire[$i]->{'service'}; ?></td>
                        <td>
                            <button><em class="fa fa-edit"></em></button>
                            <button type="button" data-toggle="modal" data-target="#confirmationSup"><em class="fa fa-trash-alt"></em></button>
                        </td>
                    </tr>
                    <tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
</div>

<!-- MODAL -->

<div class="modal fade" id="confirmationSup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer <?php echo "" ?> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
        <button type="button" class="btn btn-primary">Je confirme</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un secretaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="lastname" class="col-form-label">Nom:</label>
            <input type="text" name="lastname" class="form-control" id="lastname">
          </div>
          <div class="form-group">
            <label for="firstname" class="col-form-label">Prenom:</label>
            <input type="text" name="firstname" class="form-control" id="firstname">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Adresse mail:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Mot de passe:</label>
            <input type="password" name="psw" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Confirmation mot de passe:</label>
            <input type="password" name="psw2" class="form-control" id="password">
          </div>
          <div class="form-group">
              <label class="col-form-label" for="service">Service:</label>
              <select class="form-control" name="service" name="service" id="service">
                  <?php
                    for ($i=0; $i < sizeof($tableService); $i++) { 
                        echo "<option value=".$tableService[$i].">".$tableService[$i]."</option>";
                    }
                  ?>
              </select>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<?php
    if (isset($_POST['ajouter'])) {
        if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['psw2'])) {
            # code...
        }
    }
?>

</div>