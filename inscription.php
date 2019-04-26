<?php 
	
	require('config.php');

	$succes = true;
	$nom = $prenom = $numero = $localite = $fonction = $email = $password = "";
	$errNom = $errPrenom = $errNumero =  $errLocalite = $errFonction = $errEmail = $errPassword = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['nom']) && !empty($_POST['nom'])){

			if(preg_match("#[a-zA-Z]#", $_POST['nom']) && strlen($_POST['nom']) > 1){

				$succesNom = true;
				$nom = $_POST['nom'];
			}else{

				$nom = $_POST['nom'];
				$succesNom = false;
				$errNom = "Ce champs doit contenir au moins 2 carractères";
			}

		}else{

			$succesNom = false;
			$errNom = "Veillez remplir ce champs";
		}

		if(isset($_POST['prenom']) && !empty($_POST['prenom'])){

			if(preg_match("#[a-zA-Z]#", $_POST['prenom']) && strlen($_POST['prenom']) > 1){

				$succesPrenom = true;
				$prenom = $_POST['prenom'];
			}else{

				$prenom = $_POST['prenom'];
				$succesPrenom = false;
				$errPrenom = "Ce champs doit contenir au moins 2 carractères";
			}

		}else{

			$succesPrenom = false;
			$errPrenom = "Veillez remplir ce champs";
		}

		if(isset($_POST['numero']) && !empty($_POST['numero'])){

			if(strlen($_POST['numero']) >= 8){

				$succesNumero = true;
				$numero = $_POST['numero'];
			}else{

				$numero = $_POST['numero'];
				$succesNumero = false;
				$errNumero = "Ce champs doit contenir au moins 8 carractères";
			}

		}else{

			$succesNumero = false;
			$errNumero = "Veillez remplir ce champs";
		}

		if(isset($_POST['localite']) && !empty($_POST['localite'])){

			if(preg_match("#[a-zA-Z]#", $_POST['localite'])){

				$succesLocalite = true;
				$localite = $_POST['localite'];

			}else{

				$localite = $_POST['localite'];
				$succesLocalite = false;
				$errLocalite = "Ce champs doit contenir que des carractères alphabetiques";
			}

		}else{

			$succesLocalite = false;
			$errLocalite = "Veillez remplir ce champs";
		}


		if(isset($_POST['fonction']) && !empty($_POST['fonction'])){

			if($_POST['fonction'] == ""){

				$fonction = $_POST['fonction'];
				$succesFonction = flase;
				$errFonction = "Veillez selectionner votre fonction";

			}else{

				$fonction = $_POST['fonction'];
				$succesFonction = true;
			}

		}else{

			$fonction = $_POST['fonction'];
			$succesFonction = flase;
			$errFonction = "Veillez selectionner votre fonction";
		}

		if(isset($_POST['email']) && !empty($_POST['email'])){

			if(preg_match("/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/", $_POST['email']))
			{

				$succesEmail = true;
				$email = $_POST['email'];

			}else{

				$email = $_POST['email'];
				$succesEmail = false;
				$errEmail = "Ce champs doit respecter la forme d'une adresse email";
			}

		}else{

			$succesEmail = false;
			$errEmail = "Veillez remplir ce champs";
		}

		if(isset($_POST['passwords']) && !empty($_POST['passwords'])){

			if(strlen($_POST['passwords']) > 5) {

				$password = $_POST['passwords'];
				$succesPassword = true;

			}else{

				$password = $_POST['passwords'];
				$succesPassword = false;
				$errPassword = "Votre mot de passe doit être au moins 6 carractères";
			}

		}else{

			$password = $_POST['passwords'];
			$succesPassword = false;
			$errPassword = "Veillez remplir ce champs";
		}

		$succes = $succesNom && $succesPrenom && $succesNumero && $succesLocalite && $succesFonction && $succesEmail && $succesPassword;

		if($succes){

			$insert = $db->prepare("INSERT INTO users(id_user,nom,prenom,numero,localite,fonction,email,passwords) VALUES(NULL,?,?,?,?,?,?,?)");
			$insert->execute(array($nom,$prenom,$numero,$localite,$fonction,$email,$password));
		}

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
		<link href="style_ens.css" rel="stylesheet" />
		<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" type="text/css">
		 <!-- <link rel="stylesheet" type="text/css" href='style.css'> -->
	</head>
	<body>
		<h2 style="color: white;border: 1px solid yellow;border-radius: 4px 2px 3px 4px;box-shadow: 4px 4px 4px 4px;margin: 25px 70px">INSCRIPTION</h2>

		<?php if(isset($_POST['inscrire']) && isset($succes) && isset($insert)) { ?> 
			<div class='alert alert-success center' style='width: 90%; margin: auto;'>
				<p>Votre inscription a été effectuée avec sucees. <a href="connect.php">Connectez-vous</a> </p>
			</div>
			<br><br>
			
		<?php } else {?>
			 <div class='alert alert-danger center' style='width: 90%; margin: auto;'>
			 	<p>Inscrivez-vous</p>
			 </div>
			 <br><br> 
		<?php }?>

		<center>
			<div class="container">

				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<form method="POST" action="">
							<div class="row">
								<div class="col-md-6">
									<label>NOM* : </label>
									
									<input type="text" name="nom" placeholder="" value="<?php echo $nom ?>"/>
									<p style="color:red;"><?php echo $errNom ?></p>
								</div>
								<div class="col-md-6">
									<label>PRENOM* : </label>
								
									<input type="text" name="prenom" placeholder="" value="<?php echo $prenom ?>"/>
									<p style="color:red;"><?php echo $errPrenom ?></p>
								</div>
								<div class="col-md-6">
									<label>NUMERO* : </label>

									<input type="tel" name="numero" placeholder="" value="<?php echo $numero ?>"/>
									<p style="color:red;"><?php echo $errNumero ?></p>
								</div>
								<div class="col-md-6">
									<label>LOCALITE* : </label>
									
									<input type="text" name="localite" placeholder="" value="<?php echo $localite ?>"/>
									<p style="color:red;"><?php echo $errLocalite ?></p>
									
								</div>
								
								<div class="col-md-6">
									<label>EMAIL* : </label>
									
									<input type="email" name="email" placeholder="" value="<?php echo $email ?>"/>
									<p style="color:red;"><?php echo $errEmail ?></p>
								</div>

								<div class="col-md-6">
									<label>MOT DE PASSE* : </label>
									
									<input type="password" name="passwords" placeholder="" />
									<p style="color:red;"><?php echo $errPassword ?></p>
								</div>

								<div class="col-md-6">
									<label>FONCTION* : </label>
									
									<select name="fonction">
										<option value="<?php if($fonction == ""){ echo 'selected';} ?>">Donner votre fonction</option>
										<option value="Menuisier" <?php if($fonction == "Menuisier"){ echo 'selected';} ?>>Menuisier</option>
										<option value="Maçon" <?php if($fonction == "Maçon"){ echo 'selected';} ?>>Maçon</option>
										<option value="Plombier" <?php if($fonction == "Plombier"){ echo 'selected';} ?>>Plombier</option>
										<option value="Electricien" <?php if($fonction == "Electricien"){ echo 'selected';} ?>>Electricien</option>
										<option value="Manoeuvre" <?php if($fonction == "Manoeuvre"){ echo 'selected';} ?>>Manoeuvres</option>
										<option value="bâtiment" <?php if($fonction == "bâtiment"){ echo 'selected';} ?>>Igénière bâtiment</option>
										<option value="Propriètaire chantier" <?php if($fonction == "Propriètaire chantier"){ echo 'selected';} ?>>Propriètaire chantier</option>
									</select>
									<p style="color:red;"><?php echo $errFonction ?></p>
								</div>
								<div class="col-md-12">
									<input type="submit" name="inscrire" value="S'INSCRIRE"" />
								</div>
								<br>
								<div class="col-md-6">
									<span style="color:white;font-size: 20px" > Si vous êtes déjà inscrit cliquer sur <a href="connect.php" > Connexion</a></span>
								</div>

							</div>

						</form>
					</div>
				</div>
			</div>
		</center>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	</body>
</html>
