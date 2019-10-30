<?php

$bdd = new PDO('mysql:host=localhost;dbname=rendezVous;charset=utf8', 'root', 'root');

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM rendezVous WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['patient']) && isset($_POST['medecin']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$patient = $_POST['patient'];
	$medecin = $_POST['medecin'];
	$color = $_POST['color'];
	
	$sql = "UPDATE rendezVous SET  patient = '$patient', medecin = '$medecin', color = '$color' WHERE id = $id ";

	
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
header('Location: ../../secretaire?include=rendezvous');

	
?>
