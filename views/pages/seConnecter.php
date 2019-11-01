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
<div class="toasts">
	<div class="toast" data-autohide="false">
		<div class="toast-header">
			<strong class="mr-auto text-primary">Compte admin</strong>
			<small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
			<strong>email:</strong> admin@dalaljamm.com
			<br>
			<strong>password:</strong> admin
		</div>
	</div>

	<!-- <div class="toast" data-autohide="false">
		<div class="toast-header">
			<strong class="mr-auto text-primary">Compte admin</strong>
			<small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
			<strong>email:</strong> admin@dalaljamm.com
			<br>
			<strong>password:</strong> dalaljamm
		</div>
	</div>

	<div class="toast" data-autohide="false">
		<div class="toast-header">
			<strong class="mr-auto text-primary">Compte admin</strong>
			<small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
			<strong>email:</strong> admin@dalaljamm.com
			<br>
			<strong>password:</strong> dalaljamm
		</div>
	</div> -->
</div>
<h2>Espace de connexion Dalal Diamm</h2>

<div class="cont">
  
  <div class="form">
    <form method="POST" action="app/config/traitement.php">
	  <h1>Connexion</h1>
		<?php
			echo $form->input($email, "email", "user");
		?>
		<?php
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
<?php
	}
?>
<script>
	$(document).ready(function(){
		$('.toast').toast('show');
	});
/* 
	$('#submit-btn').hide(); 
	$("#email").keydown(function() {
		if(isEmail($("#email").val())) {
			$('#submit-btn').show(); 
		}
		else{
			$('#submit-btn').hide();
		}
	}); */
</script>