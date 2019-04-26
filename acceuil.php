<?php
	
	session_start();

	if(!isset($_SESSION['id_user'])){

		header("Location: connect.php");
	}

	include('config.php');

	$req_s = $db->prepare("SELECT * FROM service");
	$req_s->execute();
	$req_resu = $req_s->fetchAll();

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Construc online</title>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">

    <style type="text/css">
    	
    	.wrapper{

			width: 940px;
			margin: 0 auto;
			padding: 0 10px; 

		}

	    footer{

			height: 260px;
			background-color: #444;
		}

		footer h1{

			color: #fff;
			text-align: center;
			padding-top: 80px;

		}

		.copyright{

			text-align: center;
			font-weight: bold;
			padding-top: 30px;
			color: #777;
		}
    </style>

</head>
<body>

	
    <?php include('header.php'); ?>
<marquee><span style="color:white;"><?php echo $_SESSION['nom'] ?> <?php echo $_SESSION['prenom'] ?> Bienvenu sur le site de construction en ligne,  </marquee>
    <div class="space">
    	
    </div>

    
    <div class="container liste">

	    <div class="row">
	    	<?php foreach($req_resu as $result){ ?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/<?php echo $result['photo'];?>" alt="...">
					<div  class="price"><?php echo $result['nom_serv'] ?></div>
					<div class="caption">
						<h4>Description</h4>
						<p> <?php echo $result['description'] ?></p>
						<h4>Lieu : <small><?php echo $result['lieu'] ?></small></h4>
						<p>date debut: <?php echo $result['date_deb']?> </p>
						<p>date fin: <?php echo $result['date_fin'] ?> </p>
						<a href="post.php?id=<?php echo $result['id_serv'] ?>" class="btn btn-order" role="button"><span class="glyphicon glyphicon-user"></span> Postuler</a>
					</div>
				</div>	
			</div>

 			<?php }?>
		</div>
		
	</div>
	
    
	<footer>

		<div class="wrapper">
			
			<h1>Construct <span class="orange">.</span></h1>
			<div class="copyright">Copyright &#169 2016. Tous droit réservés.</div>
		</div>

	</footer>

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