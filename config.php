<?php 
	
	$host = "localhost";
	$user = "root";
	$pass = "";

	try{

		$db = new PDO("mysql:host=$host;dbname=db_construct;charset=utf8",$user,$pass);
		$db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){

		echo "Erreur".die($e->getMessage());
	}

?>