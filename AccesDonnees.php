<?php

$modeacces = "mysql";

/**
 * Effectue une connexion � la bdd locale
 * @param unUtilisateur string
 * 	<p>Nom de l'utilisateur </p>
 * @param unMotdepasse string
 * 	<p>Mot de passe de l'utilisateur</p>
 * @param uneBasededonnee string
 * 	<p>Nom de la bdd </p>
 * 
 * @return Retourne l'identifiant de connexion MySQL en cas de succ�s ou False si une erreur survient.array
 * 
 * @author Anaelle Rannou
 * 
 * @version 1.0
 * 
 * @copyright ESTRAN
*/

function connexion($host,$port,$dbname,$user,$password) {
	
	global $modeacces, $connexion;
	
	if ($modeacces=="mysql") {
		@$link = mysql_connect("$host", "$user", "$password")
		or die("Impossible de se connecter au serveur : " . mysql_error());
		@$connexion = mysql_select_db("$dbname")
		or die("Impossible d'ouvrir la base : ".mysql_error());
		return $connexion;
	}

	if ($modeacces=="mysqli") {
		@$connexion = new mysqli("$host", "$user", "$password", "$dbname", $port);
		if ($connexion->connect_error) {
			die('Erreur de connexion (' . $connexion->connect_errno . ') '. $connexion->connect_error);
		}
		return $connexion;
	}

}

/** d�connecte la base de donn�e
 * @param modeacces string permet de choisir le mode d'acc�s
 * 	<p>MySQL ou MySQLi</p>
 * @param connexion permet de connecter � la bdd
 * 	<p>utilis� en mysqli</p>
 * 
 * @mysql_close() ferme la connexion en mysql
 * 
 * @close() ferme la connexion fa�te auparavant en mysqli()
 */

function deconnexion() {
	
	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		mysql_close();
	}

	if ($modeacces=="mysqli") {
		$connexion->close();
	}

}

/*g�n�raliser en �crivant la fonction 'executeSQL'
 qui sera ind�pendante du moteur d'acc�s aux donn�es
dans la librairie 'AccesDonnees.php'*/

/**
 * function qui permet d'executer une requ�te sql
 * @param connexion param�tre qui permet de se connecter
 * 	<p>utlis� en mysqli</p>
 * @param sql param�tre qui permet d'obtenir la requ�te sql
 * 	<p>
 */


function executeSQL ($connexion, $sql ) {

global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql)
		//	or die ("Erreur SQL");
		//or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__);
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysql_error().
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql)
		//	or die ("Erreur SQL");
		//or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__);
		or die /*("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysql_error_list($connexion)[0]['error'].
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");*/;
		return $result;
	}
}

/**
 * 
 * @param unknown $connexion
 * @param unknown $sql
 * @return number|unknown
 */

function compteSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$num_rows = $connexion->affected_rows;
		return $num_rows;
	}

}

function tableSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$rows=array();
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$rows=array();
		while ($row = $result->fetch_array(MYSQLI_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

}

function champSQL($connexion, $sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql);
		$rows = mysql_fetch_array($result, MYSQL_NUM);
		return $rows[0];
	}


	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql);
		$rows = $result->fetch_array(MYSQLI_NUM);
		return $rows[0];
	}

}

?>