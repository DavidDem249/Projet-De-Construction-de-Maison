<?php 
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" charset="utf-8">
	<title>Login</title>

    <link rel="stylesheet" type="text/css" href='style.css'>
	<link rel="stylesheet" type="text/css" href="styleLogin.css">
</head>
<body>
	<div class="login-box">

		<h1>Login</h1>
		<form method="POST" action="Admin/dashboard.php">
			
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="email" name="email" placeholder="Votre email" value="<?php if(isset($email)){ echo $email; }?>">

			</div>

			<?php 
				if(isset($errM)){
			?>
				<div style="color:red;"><?= $errM ?></div>

			<?php } ?>

			
			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" name="passwords" placeholder="Votre mot de pass" value="">
			</div>

			<?php 
				if(isset($errMdp)){
			?>
				<div style="color: red;"><?= $errMdp ?></div>

			<?php } ?>

			<input class="btn" type="submit" name="valider" value="Sign in">
			<?php 
				if(isset($errMe)){
			?>
				<div style="color:red;"><?= $errMe ?></div>

			<?php } ?>
 			<p style="border: 1px solid white;padding:5px">Pas de compte ? <a href="inscription.php">S'inscrire</a></p>
		</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


	    <script type="text/javascript">

	    	$(document).ready(function(){

    		$('.menu-toggle').click(function(){
    			$('.menu-toggle').toggleClass('active')
    			$('nav').toggleClass('active')
    		})
    	});

    </script>
</body>
</html>