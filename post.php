<?php
	
	session_start();

	require('config.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$data = $db->prepare("SELECT nom_serv FROM service WHERE id_serv ='".$id."' ");
		$data->execute();
		$resu = $data->fetch();
	}

	
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['envoyer']) && !empty($_POST['experience'])){


			$expe = $_POST['experience'];
			$id_serv = $_GET['id'];
			$id_s = $_SESSION['id_user'];

			$inser = $db->prepare("INSERT INTO demande(id_dem,id_user,id_serv,experience) VALUES(NULL,?,?,?)");
			$inser->execute(array($id_s,$id_serv,$expe));
			
		}

	
	}
		

?>


<!DOCTYPE html>
<html>
	<head>

		<title>Chantier</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" type="text/css">
		 <link rel="stylesheet" type="text/css" href='style.css'>

		<style type="text/css">
			
			body{

				background-color: #0069d6;
			}
			#contact-form{
				border: 1px solid orange;
				border-radius: 8px 6px 8px 8px;
				padding: 18px;
				box-shadow: 4px 2px 6px 4px;

			}
			.blue{

				color: blue;
			}
			.col-md-6, .col-md-12{

				background-color: grey;
				padding: 8px;

			}

			.button1{
				border: 1px solid #ddd;
				background: #ffa500;
				color: #fff;
				margin-left: 20px;
				width: 50%;
				font-weight: bold;
/*				text-transform: uppercase;
*/				border-radius: 5px;
				padding: 8px;
				transition: all 0.3s ease-in 0s;
			}

			button{
				border: 1px solid #ddd;
				background: #ffa500;
				color: #fff;
				width: 50%;
				padding: 8px;

			}

		</style>

	</head>

	<body>

	<?php include("header.php"); ?>
	<?php require("messageD.php"); ?>
	<div class="container">

		<h2 style="color: white;border: 1px solid yellow;border-radius: 4px 2px 3px 4px;box-shadow: 4px 4px 4px 4px;margin: 0 30px; text-align: center">POSTULER PARTICIPER A L'ELABORATION DES CETTE CONSTRUCTION</h2>
		<br>
		<?php if(isset($_POST['envoyer']) && isset($inser)) { ?> 
			<div class='alert alert-success center' style='width: 90%; margin: auto;'>
				<p>Votre demande a été enregistré, merci d'avoir postuler. <a href="acceuil.php"> Retour</a> </p>
			</div>
			
		<?php } else {?>
			 <div class='alert alert-danger center' style='width: 90%; margin: auto;'>
			 	<p>Veillez remplir seulement le champs expérience</p>
			 </div>
			 <br><br> 
		<?php }?>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="POST" role="form">

					<div class="row">
						
					
						<div class="col-md-6">

							<label for="nom">Nom<span class="blue"> *</span></label>
							<input type="text" id="nom" name="nom" class="form-control" placeholder="Votre Nom" value="<?php echo $_SESSION['nom'] ?>">
							<p class="commentaire"></p>

						</div>

						<div class="col-md-6">

							<label for="prenom">Prénom<span class="blue"> *</span></label>
							<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre Prénom" value="<?php echo $_SESSION['prenom'] ?>">
							<p class="commentaire"></p>

						</div>

						<div class="col-md-6">

							<label for="email">Email<span class="blue"> *</span></label>
							<input type="text" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $_SESSION['email'] ?>">
							<p class="commentaire"></p>

						</div>
					
						<div class="col-md-6">

							<label for="prenom">Téléphone</label>
							<input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Votre Telephone" value="<?php echo $_SESSION['numero'] ?>">
							<p class="commentaire"></p>

						</div>
					
						<div class="col-md-6">

							<label for="service">Type service</label>
							<input type="text" id="service" name="service" class="form-control" placeholder="le type service" value="<?php echo $resu['nom_serv']; ?>">
							<p class="commentaire"></p>

						</div>

						<div class="col-md-6">

							<label for="fonction">Fonction</label>
							<input type="text" id="fonction" name="fonction" class="form-control" placeholder="Indiquez votre fonction" value="<?php echo $_SESSION['fonction'] ?>">
							<p class="commentaire"></p>

						</div>
						
						<div class="col-md-12">

							<label for="experience">Experience<span class="blue"> *</span></label>
							<textarea id="experience" name="experience" class="form-control" placeholder="Votre Experience svp" rows="4"></textarea>  
							<p class="commentaire"></p>

						</div>

						<div class="col-md-12">

							<p class="blue"> * <strong>Ces informations sont requises</strong> </p>

						</div>
					
						<div class="col-md-6">

							<input type="submit"  name="envoyer" class="button1" value="Envoyer">
						</div>

						<div class="col-md-6">
							<button type="button" data-toggle="modal" data-target="#mymodal">Verifier</button>
						</div>
						
						
					</div>

					
				</form>
			</div>
			
		</div>
	</div>
</body>