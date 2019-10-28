<?php

// Connexion à la base de données
require "../class/database.class.php";

$bdd = Database::getPDO();

//echo $_POST['patient'];
if (isset($_POST['patient']) && isset($_POST['date']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$patient = $_POST['patient'];
	$date = $_POST['date'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO rendezVous(patient, date, start, end, color) values ('$patient', '$date', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
