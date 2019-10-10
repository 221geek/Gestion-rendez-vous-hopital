<?php
	$title = "dalal diamm : connexion";
	$style = "views/css/connexion.css";
	
	$form = new Form();
	$email = "email";
	$passw = "password";
	$role = "role";
?>
<div class="connexion">

	<img src="views/img/logodj.png" alt="logo">

	<form action="app/config/traitement.php" method="POST">

		<div class="form-group">
			<?php
				echo $form->label($role, 'Role');
			?>
			<select class="custom-select" name="role">
				<option selected>Selectionner votre role</option>
					<?php
						echo $form->option("administrateur");
						echo $form->option("medecin");
						echo $form->option("secretaire");
					?>
			</select>
			<?php
				echo $form->messageErreur($role);
			?>
		</div>

		<div class="form-group">
			<?php
				echo $form->label($email, "Adresse Email");
				echo $form->input($email);
				echo $form->messageErreur($email);
			?>
		</div>
		<div class="form-group">
			<?php
				echo $form->label($passw, "Mot de passe");
				echo $form->input($passw);
				echo $form->messageErreur($passw);
			?>
		</div>
		
		<?php
			echo $form->submit();
		?>

	</form>
</div>