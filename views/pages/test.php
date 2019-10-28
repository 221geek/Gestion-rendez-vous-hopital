<?php

require "../app/class/Medecin.class.php";
require "../app/class/MedecinManager.class.php";

$bd=Database::getPDO();

$table = array();
$ServiceMedecins = array();

$req = $bd->query("SELECT * FROM users WHERE id_role=3");

    while ($donnees = $req->fetch()) {
        $table[] = $donnees;
    }
for ($i=0; $i < sizeof($table); $i++) {
    $req3 = $bd->query("SELECT specialite FROM specialites,medecins WHERE specialites.id = medecins.id_specialites AND medecins.id=".$table[$i]->{'id'});
    $spe = $req3->fetch();
    $SpeMedecins[$i] = $spe;
}
var_dump($SpeMedecins);