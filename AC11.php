<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="content-language" content="fr">
		<link rel="stylesheet" href="AC11.css" />
		<title>AC11</title>
	</head>
	<body>				
		<table id="affichetableau">
		<thead>
		    <tr height="30" id="title">
			    <th id="title" colspan="8"> AC11 - Organiser les tournées - Listes des tournées </th>
			</tr>
			<tr height="30">
		    	<th>Tourn&eacute;e</th>
		    	<th>Date</th>
			    <th>Chauffeur</th>
			    <th>V&eacute;hicule</th>
				<th>Départ</th>
				<th>Arriv&eacute;e</th>
				<th>Supprimer</th>
			    <th>Modifier</th>			   
			</tr>	
		</thead>
	

<?php
		//include le fichier de connexion
			include 'connectAD.php';
		//Creation et stockage de la requette dans une variable
			$sql = "SELECT TRNNUM,TRNDTE,CHFNOM,VEHIMMAT FROM tournee,chauffeur WHERE tournee.CHFID=chauffeur.CHFID;";
		//execution de la requette avec mysql_query
			$result = mysql_query($sql);
		//en cas de resultat on rentre dans le IF
		if($result)
			{	
				while ($row = mysql_fetch_array($result, MYSQL_BOTH))			
					{
?>	
						<tr>
							<th> <?php echo $row[0]; ?> </th>
							<th> <?php echo $row[1]; ?> </th>
							<th> <?php echo $row[2]; ?> </th>
							<th> <?php echo $row[3]; ?> </th>
							<th> 
								<?php
									$depart_sql = "SELECT TRNNUM FROM tournee ;";
									$depart = mysql_query($depart_sql); 
									$depart = mysql_fetch_array($depart,MYSQL_BOTH);
									echo $depart[0]; 
								?>
							</th>
							<th> 
								<?php
									$arrivee_sql = "SELECT TRNNUM FROM tournee ;";
									$arrivee = mysql_query($arrivee_sql); 
									$arrivee = mysql_fetch_array($arrivee,MYSQL_BOTH);
									echo $arrivee[0]; 
								?>
							</th>							
							<th> <form id="form_effacer" action="efface.php"> <input id="effacer" name="effacer" type="submit" value="" onclick="location.href='tableau_de_donnees.php'"> </input> </form> </th>
						    <th> <form> <input id="modifier" name="modifier" type="button" value="" onclick="location.href='fiche_tourne_test.php'"> </input> </form> </th>
						<tr />	
<?php	
					}	
			}	
?>
		</table>	
			<br></br>
			<input id="add" type="button" name="add" value="Ajouter"  onclick="location.href='fiche_tourne_test.php'" />
			<input id="back" type="button" name="retour" value="Retour" onclick="location.href='tableau_de_donnees.php'" />
	
	</body>
</html>