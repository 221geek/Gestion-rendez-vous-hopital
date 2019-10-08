<?php
	$title = "dalal diamm : connexion"; 
?>
<div class="connexion">
	<img src="views/img/logodj.png" alt="logo">
	<form action="app/config/traitement.php" method="POST">
		<div class="form-group">
			<label for="email">Adresse mail</label>
			<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Entrer votre adresse email" id="email">
			<small id="emailHelp" class="hide"></small>
		</div>
		<div class="form-group">
			<label for="password">Mot de passe</label>
			<input type="password" class="form-control" aria-describedby="passwordHelp" placeholder="Entrer votre mot de passe" id="password">
			<small id="passwordHelp" class="hide"></small>
		</div>
		
		<button type="submit" class="btn btn-primary" onsubmit="return traitementJS()">Se connecter</button>

	</form>
</div>