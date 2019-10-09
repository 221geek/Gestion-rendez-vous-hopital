<?php
	$title = "dalal diamm : connexion";
	$form = new Form();
	$email = "email";
	$passw = "password";
?>
<div class="connexion">
	<img src="views/img/logodj.png" alt="logo">
	<form action="app/config/traitement.php" method="POST">
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