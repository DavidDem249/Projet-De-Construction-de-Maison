<?php 
	session_start();

	if(!isset($_SESSION['id_user']))
	{
		header('Location: connect.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Construction</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styleIndex.css">
    <link rel="stylesheet" type="text/css" href='style.css'>
</head>
<body>

		<?php require('header.php'); ?>
<marquee><span style="color:white;"><?php echo $_SESSION['nom'] ?> <?php echo $_SESSION['prenom'] ?> Bienvenu sur le site de construction en ligne,  </marquee>
		<section id="main-image">

			<h3> <strong> Retouver des chantiers en construction <br>et aussi gagner des projets de construction</strong></h3>
			
			
			<div class="wrapper">
				
			</div>

		</section>

		<section id="steps">

			<div class="wrapper">
				<ul>
					
					<li id="step1">
						<h4 style="color:white;">Les meilleurs plans de construction</h4>
						<p style="color:aqua;">Confiez-nous votre plans de maison ou commandés des plans pour la construction de votre maison</p>
					</li>

					<li id="step2">
						<h4 style="color:white;">Les travailleurs expérimentés</h4>
						<p style="color:aqua;">Nous avons pour vous des meilleurs Maçons, Menuisier, electricien, et autres pour vous satisfaire...</p>
					</li>

					<li id="step3">
						<h4 style="color:white;">Les ingenieurs bâtiment</h4>
						<p style="color:aqua;">Nous avons à votre disposition des ingenieurs dans le domaine de la construction de maison.</p>
					</li>

					<div class="clear"></div>

				</ul>
			</div>
			
		</section>

		
		<section id="contact">

			<div class="wrapper">

				<h3>Contactez-nous</h3>

				<p>Chez nous vous disposez de tous pour être à l'aise dans vos différentes construction.
				Vous avez aussi la possibilité d'avoir des opportunités de construction et aussi de pouvoir chercher des personnes expérimentées dans le domaine de la construction </p>
				
				<form>
					
					<label for ="name">Nom</label>
					<input type="text" id="name" placeholder="Votre Nom">

					<label for ="email">Email</label>
					<input type="email" id="email" placeholder="Votre Email">

					
					<textarea name="txt" id="txt" placeholder="Saisissez votre message"></textarea>
					<br>

					<input type="submit" value="Envoyer" class="bouton-3">
				</form>
			</div>
			
		</section>


		<footer>

			<div class="wrapper">
				
				<h1>AGENCE DE CONSTRUCTION EN LIGNE <span class="orange">.</span></h1>
				<div class="copyright">Copyright &#169 2016. Tous droit réservés.</div>
			</div>

		</footer>

	</body>

</html>