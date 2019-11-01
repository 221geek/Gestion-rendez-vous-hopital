<?php
    $jours = array();
    $req = $bd->query('SELECT * FROM horaires');
    while ($semaine = $req->fetch()) {
        $jours[] = $semaine;
    }
?>

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    <h4>HORAIRES</h4>
    <?php for ($i=0; $i < sizeof($jours); $i++) { ?>
        <a href="#" class="list-group-item list-group-item-action">
            <?php echo $jours[$i]->{'day'}; ?>
            <div>
                De <kbd><?php echo substr($jours[$i]->{'start'}, 0, 5); ?></kbd> a <kbd><?php echo substr($jours[$i]->{'end'}, 0, 5); ?></kbd>
            </div>
        </a>
    <?php } ?>
  </a>
</div>
