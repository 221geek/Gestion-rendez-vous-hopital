<?php

// Connexion à la base de données

$bdd = new PDO('mysql:host=localhost;dbname=rendezVous;charset=utf8', 'root', 'root');


if (isset($_POST['Event'][0]) && isset($_POST['Event'][1])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];

	$sql = "UPDATE rendezVous SET start = '$start' WHERE id = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
