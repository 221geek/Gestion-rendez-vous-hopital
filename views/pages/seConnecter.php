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