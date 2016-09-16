<?php
	include "AccesDonnees.php";

	$ip=explode(".",$_SERVER['SERVER_ADDR']);

	switch ($ip[0]) {

		case 127 :
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "mesguen";
			$port='3306';
			break;

		case "::1":
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "mesguen";
			$port='3306';
			break;

		case 192 :
		//local
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "mesguen";
			$port='3306';
			break;
		
		case 10 :
		//local
			$host = "10.0.80.40";
			$user = "slam";
			$password = "password";
			$dbname = "mesguen";
			$port='3306';
			break;


		default :
			exit ("Serveur non reconnu...");
			break;
	}
	
	$connexion=connexion($host,$port,$dbname,$user,$password);
		
?>

