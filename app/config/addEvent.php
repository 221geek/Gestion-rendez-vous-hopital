<?php

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=rendezVous;charset=utf8', 'root', 'root');

//echo $_POST['patient'];
if (isset($_POST['patient']) && isset($_POST['medecin']) && isset($_POST['start']) && isset($_POST['color'])){
	
	$patient = $_POST['patient'];
	$medecin = $_POST['medecin'];
	$start = $_POST['start'];
	$color = $_POST['color'];

	$sql = "INSERT INTO rendezVous(patient, medecin, start, color) values ('$patient', '$medecin', '$start', '$color')";
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
