<?php
	$title = "dalal diamm : connexion";
	$style = "views/css/connexion.css";
	
	$form = new Form();
	$email = "email";
	$passw = "password";
	$role = "role";
/* 
	$bd = Database::getPDO();

    $statement = $bd->query("SELECT role FROM role");
    $roles = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($roles as $key){
        $tablerole[] = implode(', ', array_values($key));
    }
    sort($tablerole); */
?>
<h2>Espace de connexion Dalal Diamm</h2>

<div class="cont">
  
  <div class="form">
    <form method="POST" action="app/config/traitement.php">
	  <h1>Connexion</h1>
	 <?php
	 	echo $form->input($email, "email", "user");
	 	echo $form->input($passw, "mot_de_passe", "pass");
	 	echo $form->submit("SE CONNECTER", "login");
	 ?>
    
    </form>
  </div>  
</div>