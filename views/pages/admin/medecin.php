<?php

$table = array();
$ServiceMedecins = array();

$req = $bd->query("SELECT * FROM users WHERE id_role=3");

    while ($donnees = $req->fetch()) {
        $table[] = $donnees;
    }
    for ($i=0; $i < sizeof($table); $i++) {
        $req2 = $bd->query("SELECT service FROM services,medecins WHERE services.id = medecins.id_services AND medecins.id=".$table[$i]->{'id'});
        $serv = $req2->fetch();
        $ServiceMedecins[$i] = $serv;
    }
    
    for ($i=0; $i < sizeof($table); $i++) {
        $req3 = $bd->query("SELECT * FROM specialites,medecins WHERE specialites.id = medecins.id_specialites AND medecins.id=".$table[$i]->{'id'});
        $spe = $req3->fetch();
        $SpeMedecins[$i] = $spe;
    }
    var_dump($SpeMedecins);
?>

<div class="container-fluid">
    <div class="crud">
        <div class="entete bg-dark">
            <h3>Medecins</h3>
            <div>
                <button class="btn btn-danger" onclick="deleteCheck('supp[]');" data-toggle="modal" data-target="#confirmCheckbox"><em class="fa fa-user-minus"></em> Supprimer</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#ajouter"><em class="fa fa-user-plus"></em> Ajouter un medecin</button>
            </div>
        </div>
        <table class="table table-dark" aria-describedby="crud">
            <thead>
                <tr>
                    <th scope="col"><input name="all" onclick="checkAllBox(this, 'supp[]');" class="" type="checkbox"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Service</th>
                    <th scope="col">Spécialités</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
                <tbody>
                    <?php for ($i=0; $i < sizeof($table); $i++) { ?>
                    <tr>
                        <th scope="row">
                            <input data-name="<?php echo $table[$i]->{'prenom'}; ?>" name="supp[]" value="<?php echo $table[$i]->{'mail'}; ?>" class="" type="checkbox" id="checkbox">
                        </th>
                        <td><?php echo $table[$i]->{'nom'} ?></td>
                        <td><?php echo $table[$i]->{'prenom'} ?></td>
                        <td><?php echo $table[$i]->{'mail'} ?></td>
                        <td><?php echo $ServiceMedecins[$i]->{'service'}; ?></td>
                        <td><?php echo $SpeMedecins[$i]->{'specialite'}; ?></td>
                        <td><?php echo $table[$i]->{'pass'} ?></td>
                        <td>
                            <a href="" data-nom="<?php echo $table[$i]->{'nom'}; ?>" data-prenom="<?php echo $table[$i]->{'prenom'}; ?>" data-mail="<?php echo $table[$i]->{'mail'}; ?>" data-pass="<?php echo $table[$i]->{'pass'}; ?>" data-service="<?php echo $tableService[$i]->{'id'}; ?>" data-specialite="<?php echo $tableSpe[$i]->{'id'}; ?>" class="openEdit" data-toggle="modal" data-target="#editSec"><em class="fa fa-edit"></em></a>
                            <a data-name="<?php echo $table[$i]->{'prenom'}; ?>" data-email="<?php echo $table[$i]->{'mail'} ?>" class="openConfirm" href="" data-toggle="modal" data-target="#confirmationSup"><em class="fa fa-trash-alt"></em></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
</div>

<!-- MODAL -->

<!-- modal pour confirmer la suppression -->
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
        <form method="POST" action="app/config/actionAdmin.php">
          <input type="hidden" name="mail" value="" id="confirm">
          Voulez-vous vraiment supprimer <span id="text"></span> ?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
          <button name="deleteMedecin" type="submit" class="btn btn-primary">Je confirme</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal pour ajouter -->
<div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un medecins</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/config/actionAdmin.php">
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
                        echo "<option value=".$tableService[$i]->{'id'}.">".$tableService[$i]->{'service'}."</option>";
                    }
                  ?>
              </select>
          </div>
          <div class="form-group">
              <select class="form-control" name="specialite" name="service" id="specialite">
                  <?php
                    for ($i=0; $i < sizeof($tableSpe); $i++) { 
                        echo "<option value = ".$tableSpe[$i]->{'id'}.">".$tableSpe[$i]->{'specialite'}."</option>";
                    }
                  ?>
              </select>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" name="addMedecin" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal pour editer -->
<div class="modal fade" id="editSec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un secretaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/config/actionAdmin.php">
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
                        echo "<option value=".$tableService[$i]->{'id'}.">".$tableService[$i]->{'service'}."</option>";
                    }
                  ?>
              </select>
          </div>
          <div class="form-group">
              <select class="form-control" name="specialite" name="service" id="specialite">
                  <?php
                    for ($i=0; $i < sizeof($tableSpe); $i++) { 
                        echo "<option value = ".$tableSpe[$i]->{'id'}.">".$tableSpe[$i]->{'specialite'}."</option>";
                    }
                  ?>
              </select>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" name="editSec" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmCheckbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/config/actionAdmin.php">
          <input type="hidden" name="check" value="" id="check">
          Voulez-vous vraiment supprimer ces medecins : <span id="text1"></span> ?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
          <button name="deletemedecincheckbox" type="submit" class="btn btn-primary">Je confirme</button>
        </form>
      </div>
    </div>
  </div>
</div>