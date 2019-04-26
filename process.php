<?php 
	
	require('config.php');

	$mail = $_POST['user'];
	$pass = $_POST['pass'];


	$mail = stripcslashes($mail);
	$pass = stripcslashes($pass);

	// $mail = mysql_real_escape_string($mail);
	// $pass = mysql_real_escape_string($pass);


	$req = $db->prepare("SELECT * FROM users WHERE email=? AND passwords=? ");
	$req->execute(array($mail,$pass));
	
	$row = $req->fetch();

	if($row['email'] == $mail && $row['passwords'] == $pass){
		
		echo "Bienvenue Mr ou Mme ".$row['nom'];
	}
	else
	{
		echo "echec";
	}


?>