<?php
	$title = "dalal diamm : connexion";
	$style = "views/css/connexion.css";
	
	$form = new Form();
	$email = "email";
	$passw = "password";
	$role = "role";

	$bd = Database::getPDO();

    $statement = $bd->query("SELECT role FROM role");
    $roles = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($roles as $key){
        $tablerole[] = implode(', ', array_values($key));
    }
    sort($tablerole);
?>
<div class="connexion">

	<img src="views/img/logodj.png" alt="logo">

	<form action="app/config/traitement.php" method="POST">

		<div class="form-group">
			<?php
				echo $form->label($role, 'Role');
			?>
			<select class="form-control" name="role" id="role">
				<option value="">Votre role</option>
				<?php
					for ($i=0; $i < sizeof($tablerole); $i++) { 
						echo $form->option($tablerole[$i]);
					}
				?>
			</select>
			<?php
				echo $form->messageErreur($role);
			?>
		</div>

		<div class="form-group">
			<?php
				echo $form->label($email, "Adresse Email");
				echo $form->input($email, "Entrer votre adresse mail");
				echo $form->messageErreur($email);
			?>
		</div>

		<div class="form-group">
			<?php
				echo $form->label($passw, "Mot de passe");
				echo $form->input($passw, "enter votre mot de passe");
				echo $form->messageErreur($passw);
			?>
		</div>
		
		<?php
			echo $form->submit("SE CONNECTER");
		?>

	</form>
</div>