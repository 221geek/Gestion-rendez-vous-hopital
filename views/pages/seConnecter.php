<?php
	session_start();


	$title = "HDJ : connexion";
	$style = "views/css/connexion.css";
	
	$form = new Form();
	$email = "email";
	$passw = "password";
	$role = "role";

    if (isset($_SESSION['id'])) {
		
		switch($_SESSION['role']){

			case 1:
				header('Location: admin');
			break;
			
			case 2:
				header("Location: secretaire");
			break;

			case 3 :
				header("Location: medecin");
			break;
			
			default :
				header("Location: .");			
		}
        exit;
    }
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
<?php
	if (isset($_REQUEST['error'])) {
		$error = $_REQUEST['error'];
?>
	<div class="alert alert-danger" role="alert">
		<?php echo $error; ?>
	</div>
<?php } ?>