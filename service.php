<?php 
	
	require('config.php');

	$nom = $description = $lieu = $photo = $date_deb = $date_fin = "";

	$errNom = $errDesc = $errLieu = $errPhoto = $errDate_deb = $errDate_fin = "";

	$succes = true;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['nom_ser']) && !empty($_POST['nom_ser'])){

			$nom = $_POST['nom_ser'];
			$succesNom = true; 
		}else{

			$nom = $_POST['nom_ser'];
			$succesNom = false;
			$errNom = "Veillez donner un nom valide !";
		}

		if(isset($_POST['description']) && !empty($_POST['description'])){

			$description = $_POST['description'];
			$succesDescr = true; 
		}else{

			$description = nl2br($_POST['description']);
			$succesDescr = false;
			$errDesc = "Veillez donner une description valide";

		}

		if(isset($_POST['lieu']) && !empty($_POST['lieu'])){

			$lieu = $_POST['lieu'];
			$succesLieu = true; 

		}else{

			$lieu = $_POST['lieu'];
			$succesLieu = false;
			$errLieu = "Veillez indiquez un lieu svp !";

		}

		if(isset($_FILES['photo_ser']) && $_FILES['photo_ser']['error'] == ''){

			$photo = $_FILES['photo_ser']['name'];
			$chemin_tmp = $_FILES['photo_ser']['tmp_name'];
			$chemin_def = "images/".$photo;
			$files = move_uploaded_file($chemin_tmp,$chemin_def);

			$succesPhoto = true;

		}else{

			$photo = $_FILES['photo_ser'];
			$succesPhoto = false;
			$errPhoto = "Veillez joindre une photo svp !";
		}

		if(isset($_POST['date_deb']) && !empty($_POST['date_deb'])){

			$date_deb = $_POST['date_deb'];
			$succesDateDeb = true; 

		}else{

			$date_deb = $_POST['date_deb'];
			$succesDateDeb = false;
			$errDate_fin = "Vous devez indiquer une date début !";

		}

		if(isset($_POST['date_fin']) && !empty($_POST['date_fin'])){

			$date_fin = $_POST['date_fin'];
			$succesDateFin = true; 
		}else{

			$date_fin = $_POST['date_fin'];
			$succesDateFin = false;
			$errDate_fin = "Vous devez indiquer une date fin !";
		}

		$succes = $succesNom && $succesDescr && $succesLieu && $succesPhoto && $succesDateDeb && $succesDateFin;

		if($succes){

			$insert = $db->prepare("INSERT INTO service(id_serv,nom_serv,description,lieu,photo,date_deb,date_fin) VALUES(NULL,?,?,?,?,?,?)");
			$insert->execute(array($nom,$description,$lieu,$photo,$date_deb,$date_fin));

		}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>SERVICES</title>
		<link href="style_ens.css" type="text/css" rel="stylesheet" />
		<link href="style.css" type="text/css" rel="stylesheet" />

		<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" type="text/css">
		 <!-- <link rel="stylesheet" type="text/css" href='style.css'> -->
	</head>
	<body>

		<?php require('header.php');  ?>


		<h2 style="color: white;border: 1px solid yellow;border-radius: 4px 2px 3px 4px;box-shadow: 4px 4px 4px 4px;margin: 25px 70px">PUBLICATION D'UN NOUVEAU SERVICE DE CONSTRUCTION</h2>

			<?php if(isset($_POST['enregistre']) && isset($succes) && isset($insert)) { ?> 
			<div class='alert alert-success center' style='width: 90%; margin: auto;'>
				<p>Chantier ajouter avec succés. <a href="acceuil.php"> Voir</a> </p>
			</div>
			<br><br>
			
			<?php } else {?>
				 <div class='alert alert-danger center' style='width: 90%; margin: auto;'>
				 	<p>Veillez remplir les champs correctement</p>
				 </div>
				 <br><br> 
			<?php }?>

		<center>
			<div class="container">

				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<form method="POST" action="#" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
							
									<label>NOM SERVICE : </label>
									
									<input type="text" name="nom_ser" placeholder="" value="<?php echo $nom ?>" />
									<p style="color: red;"><?php echo $errNom ?></p>
								</div>

								<div class="col-md-6">
									<label>LIEU* : </label>
								
									<input type="text" name="lieu" placeholder="" value="<?php echo $lieu ?>" />
									<p style="color: red;"><?php echo $errLieu ?></p>
								</div>

								<div class="col-md-6">
									<label>DATE DEBUT* : </label>
								
									<input type="date" name="date_deb" placeholder="" value="<?php echo $date_deb ?>" />
									<p style="color: red;"><?php echo $errDate_deb ?></p>
								</div>

								<div class="col-md-6">
									<label>DATE FIN* : </label>
									
									<input type="date" name="date_fin" placeholder="" value="<?php echo $date_fin ?>" />
									<p style="color: red;"><?php echo $errDate_fin ?></p>
								</div>

								<div class="col-md-6">
									<label>DESCRIPTION* : </label>
									
									<textarea name="description" placeholder="" style="height: 100px;"><?php echo $description ?></textarea>
									<p style="color: red;"><?php echo $errDesc ?></p>
								</div>

								<div class="col-md-6">
									<label>PHOTO* : </label>
									
									<input type="file" name="photo_ser" placeholder="" value="<?php echo $photo ?>" />
									<p style="color: red;"><?php echo $errPhoto ?></p>
								</div>


								<div class="col-md-12">
									<span style=""><input type="submit" name="enregistre" value="PUBLIER" /></span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</center>
	</body>
</html>
