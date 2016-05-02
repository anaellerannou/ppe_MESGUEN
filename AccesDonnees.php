<?php
/**
 *  Bibliothèque de fonctions AccesDonnees.php
 * 
 *
 * 
 * @author Erwan
 * @copyright Estran
 * @version 3.1.1 du Jeudi 28 Avril 2016 14:44
 *  - 
 * 	- Enregistrement des requetes SQL dans le fichier requetes.sql possible
 *  - Les requetes generant des erreurs sont automatiquement enregistrees
 * 
 */



///////////// CONFIGURATION DE L'ACCES AUX DONNEES ////////////////////

// nom du moteur d'accès à la base : mysql - mysqli
$modeacces = "mysqli";

// enregistrement des logs de connexion : true - false
$logcnx = FALSE;

// enregistrement des requetes SQL : none - all - modif
$logsql = "none";


//////////////////////////////////////////////////////////////////////



$mysql_data_type_hash = array(
		1=>'tinyint',
		2=>'smallint',
		3=>'int',
		4=>'float',
		5=>'double',
		7=>'timestamp',
		8=>'bigint',
		9=>'mediumint',
		10=>'date',
		11=>'time',
		12=>'datetime',
		13=>'year',
		16=>'bit',
		//252 is currently mapped to all text and blob types (MySQL 5.0.51a)
		252=>'blob',
		253=>'varchar',
		254=>'string',
		246=>'decimal'
);



/**
 * 
 * Ouvre une connexion à un serveur MySQL et sélectionne une base de données.
 * @param host string
 *  <p>Adresse du serveur MySQL.</p>
 * @param port integer
 *  <p>Numéro du port du serveur MySQL.</p>
 * @param dbname string
 *  <p>Nom de la base de donnees.</p>
 * @param user string
 *  <p>Nom de l'utilisateur.</p>
 * @param password string
 *  <p>Mot de passe de l'utilisateur.</p>
 * 
 * @return Retourne l'identifiant de connexion MySQL en cas de succès 
 *         ou FALSE si une erreur survient.
 */
function connexion($host,$port,$dbname,$user,$password) {
	
	global $modeacces, $logcnx, $connexion;
	

	
	if ($modeacces=="mysql") {
			
		@$link = mysql_connect("$host:$port", "$user", "$password");
		
		if (!$link) {
			
			$chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";	
			
		} else {
			
			@$connexion = mysql_select_db("$dbname");
			if (!$connexion) {
				$chaine = "Selection base PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";	
			} else {
				$chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";	
			}
			
		}
		
		if ($logcnx)
			ecritFichierLog($chaine);
				
		
		return $connexion;
		
	}

	
	if ($modeacces=="mysqli") {
		
		@$connexion = new mysqli("$host", "$user", "$password", "$dbname", $port);
		if ($connexion->connect_error) {
			
			$chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". $connexion->connect_error."\r\n";
			$connexion = FALSE;
			
		} else {
			
			 $chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";
			 
		}
		
		if ($logcnx)
			ecritFichierLog($chaine);
				
		
		return $connexion;
	}		

}


function ecritFichierLog($uneChaine) {
	$handle=fopen("log.txt","a");
		fwrite($handle,$uneChaine);
	fclose($handle);
}


/**
 *
 * Ferme la connexion MySQL.
 *
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



/**
 *
 *Envoie une requête à un serveur MySQL.
 * @param sql string
 *  <p>Requete SQL.</p>
 *
 *
 * @return  Pour les requêtes du type SELECT, SHOW, DESCRIBE, EXPLAIN et 
 *          les autres requêtes retournant un jeu de résultats, mysql_query() 
 *          retournera une ressource en cas de succès, ou FALSE en cas d'erreur.
 *          
 *          Pour les autres types de requêtes, INSERT, UPDATE, DELETE, DROP, etc., 
 *          mysql_query() retourne TRUE en cas de succès ou FALSE en cas d'erreur. 
 */
function executeSQL($sql) {

	global $modeacces, $connexion, $logsql;
	
	$uneChaine = date("j M Y - G:i:s --> ").$sql."\r\n";
	
	if ($logsql=="all") {
	
		ecritRequeteSQL($uneChaine);
	
	} else {
	
		if ($logsql=="modif") {
	
			$mot=strtolower(substr($sql,0, 6));
			if ($mot=="insert" || $mot=="update") {
				ecritRequeteSQL($uneChaine);
			}
	
		}
	
	}

	if ($modeacces=="mysql") {
		$result = mysql_query($sql)		
		or die (afficheErreur($sql, mysql_error()));		

	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql)		
		or die (afficheErreur($sql, mysqli_error_list($connexion)[0]['error']));
				//$mysqli->error_list;							

	}
	
	return $result;
}

function afficheErreur($sql, $erreur) {
	
	$uneChaine = "ERREUR SQL : ".date("j M Y - G:i:s.u --> ").$sql." : ($erreur) \r\n";
	
	ecritRequeteSQL($uneChaine);
	
	return "Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
	       "</b>.<br />Dans le fichier : ".__FILE__.
	       " a la ligne : ".__LINE__.
	       "<br />".$erreur.
			"<br /><br /><b>REQUETE SQL : </b>$sql<br />";
	
}

function ecritRequeteSQL($uneChaine) {
	$handle=fopen("requete.sql","a");
		fwrite($handle,$uneChaine);
	fclose($handle);
}


/**
 *
 *Retourne le nombre de lignes d'une requete MySQL.
 * @param sql string
 *  <p>Requete SQL.</p>
 *
 *
 * @return Le nombre de lignes dans un jeu de résultats en cas de succès 
 *         ou FALSE si une erreur survient. 
 */
function compteSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);

	if ($modeacces=="mysql") {
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}

	if ($modeacces=="mysqli") {
		$num_rows = $connexion->affected_rows;
		return $num_rows;
	}

}



/**
 *
 *Retourne un tableau résultat d'une requete MySQL.
 * @param sql string
 *  <p>Requete SQL.</p>
 *
 *
 * @return un tableau résultat de la requete MySQL.
 */
function tableSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);
	$rows=array();

	if ($modeacces=="mysql") {
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

	if ($modeacces=="mysqli") {
		while ($row = $result->fetch_array(MYSQLI_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

}



/**
 *
 *Retourne un seul champ résultat d'une requete MySQL.
 * @param sql string
 *  <p>Requete SQL.</p>
 *
 *
 * @return une chaine résultat de la requete MySQL.
 */
function champSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);
	
	if ($modeacces=="mysql") {
		$rows = mysql_fetch_array($result, MYSQL_NUM);
		return $rows[0];
	}

	if ($modeacces=="mysqli") {
		$rows = $result->fetch_array(MYSQLI_NUM);
		return $rows[0];
	}

}



/**
 *
 *Retourne le nombre de champs d'une requete MySQL
 * @param sql string
 *  <p>Requete SQL.</p>
 *
 *
 * @return Retourne le nombre de champs d'un jeu de résultat en cas de succès 
 *         ou FALSE si une erreur survient. 
 */
function nombrechamp($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);

	if ($modeacces=="mysql") {
		return mysql_num_fields($result);
	}

	if ($modeacces=="mysqli") {
		return  $result->field_count;
	}

}



/**
 *
 *Retourne le type d'une colonne MySQL spécifique
 * @param sql string
 *  <p>Requete SQL.</p>
 * @param field_offset integer
 *  <p>La position numérique du champ. field_offset commence à 0. Si field_offset 
 *     n'existe pas, une alerte E_WARNING sera également générée.</p>
 *
 *
 * @return Retourne le type du champ retourné peut être : "int", "real", "string", "blob" 
 *         ou d'autres, comme détaillé » dans la documentation MySQL.
 */
function typechamp($sql, $field_offset) {

	global $modeacces, $connexion, $mysql_data_type_hash;

	$result = executeSQL($sql);
	
	if ($modeacces=="mysql") {
		return mysql_field_type($result, $field_offset);
	}

	if ($modeacces=="mysqli") {
		return  $mysql_data_type_hash[$result->fetch_field_direct($field_offset)->type];	
	}

}



?>
