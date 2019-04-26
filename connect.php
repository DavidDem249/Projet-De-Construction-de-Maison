<?php 
	session_start();

	include "config.php";

	if(isset($_POST['inserer']))
	{
		$email = verifInput($_POST['email']);
		$password = verifInput($_POST['password']);

		

		if(!empty($email) AND !empty($password))
		{

			$users = $db->prepare("SELECT * FROM users WHERE email=? AND passwords=?");
			$users->execute(array($email,$password));

			if($users->rowCount()>0)
			{
				$data = $users->fetch();
		
				$_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['localite'] = $data['localite'];
                $_SESSION['fonction'] = $data['fonction'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['numero'] = $data['numero'];
                
                header("Location: index.php");
			}
			else{

				$erreur = "Vous n'avez pas de compte ?";
			}
		}
		else{
			$erreur = "Vous devez remplir toutes les cases";
		}

	}


	function verifInput($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Se connecter</title>
		<link href="style_ens.css" rel="stylesheet" />
	</head>

	<body style="margin-top: 100px;">
		<marquee style="color: white;font-size: 20px" >Veillez-vous connectez pour acceder à la plateforme dediée à tous travaux de construction de maison.</marquee>
		<h2 style="color: white;border: 1px solid yellow;border-radius: 4px 2px 3px 4px;box-shadow: 4px 4px 4px 4px;margin: 25px 70px">SYSTEME D'AUTHENTIFICATION</h2>
		<br><br><br><br>
		<center>
			<form method="POST" action="#">
				<table>
					<tr>
						<td>
							<label>EMAIL* : </label>
						</td>
						<td>
							<input type="email" name="email" placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							<label>MOT DE PASSE* : </label>
						</td>
						<td>
							<input type="password" name="password" placeholder="" />
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="inserer" value="SE CONNECTER" /></td>
					</tr>
					<tr>
						<td style="color:red"><p><?php if (isset($erreur)){echo $erreur;} ?></p></td>
						<td style="font-size: 19px">Si vous n'avez pas de compte inscrivez-vous<a href="inscription.php"> ici</a></td>
					</tr>
					<tr>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>