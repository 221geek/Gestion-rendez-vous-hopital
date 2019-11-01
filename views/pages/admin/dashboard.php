<?php
    $jours = array();
    $req = $bd->query('SELECT * FROM horaires');
    while ($semaine = $req->fetch()) {
        $jours[] = $semaine;
    }
?>

<div class="list-group" id="horaire">
  <a href="#" class="list-group-item list-group-item-action active">
    <h4>HORAIRES</h4>
    <?php for ($i=0; $i < sizeof($jours); $i++) { ?>
        <a href="#" data-target="#editHoraire" data-toggle="modal" data-dow="<?php echo $jours[$i]->{'dow'} ?>" data-day="<?php echo $jours[$i]->{'day'}; ?>" data-start="<?php echo $jours[$i]->{'start'}; ?>" data-end="<?php echo $jours[$i]->{'end'}; ?>" class="list-group-item list-group-item-action editHoraire">
            <?php echo $jours[$i]->{'day'}; ?>
            <div>
                De <kbd><?php echo substr($jours[$i]->{'start'}, 0, 5); ?></kbd> a <kbd><?php echo substr($jours[$i]->{'end'}, 0, 5); ?></kbd>
            </div>
        </a>
    <?php } ?>
  </a>
</div>



<!-- MODAL -->

<div class="modal fade" id="editHoraire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier les horaire de <span id="jour"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/config/actionAdmin.php">
          <div class="form-group">
            <label for="start" class="col-form-label">De :</label>
            <input type="time" class="form-control" name="start" id="start">
          </div>
          <div class="form-group">
            <label for="end" class="col-form-label">a :</label>
            <input type="time" class="form-control" name="end" id="end">
          </div>
          <input type="hidden" id="hiddenInput" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" name="updatehoraire" class="btn btn-primary">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>