<?php
	
	$title = "dalal diamm : connexion"; 
	$style = "views/css/connexion.css";
?>
<div class="connexion">
	<img src="views/img/logodj.png" alt="logo">
	<form action="">
		<div class="form-group">
			<label for="">Adresse mail</label>
			<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Entrer votre adresse email">
			<small id="emailHelp"><p class="hide">Adresse mail incorrecte</p></small>
		</div>
		<div class="form-group">
			<label for="">Mot de passe</label>
			<input type="password" class="form-control" aria-describedby="passwordHelp" placeholder="Entrer votre mot de passe">
			<small id="emailHelp"><p class="hide">Mot de passe incorecte</p><small>
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>