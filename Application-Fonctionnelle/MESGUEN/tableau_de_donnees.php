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
			    <th id="title" colspan="8"> AC11 - Organiser les tourn√©es - Listes des tourn√©es </th>
			</tr>
			<tr height="30">
		    	<th>Tourn&eacute;e</th>
		    	<th>Date</th>
			    <th>Chauffeur</th>
			    <th>V&eacute;hicule</th>
				<th>D√©part</th>
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
		//execution de la requette avec executeSQL
			$cptTournee = compteSQL($sql);
			$results = tableSQL($sql);
?>
			<tbody>
<?php
			$cpt1=0;
			
			if ($cptTournee>0) {
				foreach ($results as $ligne) {
					//on extrait chaque valeur de la ligne courante de chaque tournees.
					$TRNNUM = $ligne[0];
					$TRNDTE = $ligne[1];
					$CHFNOM = $ligne[2];
					$VEHIMMAT = $ligne[3];
			
					$cpt1++;
					
					if ($cpt1 %2 == 0) {
?>
						<tr class=\"even\">
					<?php
					} else {
					?>
						<tr class=\"odd\">
					<?php
					}
					?>
			
						
					<th><?php echo $TRNNUM; ?></th>
			
					<th><?php echo $TRNDTE; ?></th>
					
					<th><?php echo $CHFNOM; ?></th>
						
					<th><?php echo $VEHIMMAT; ?></th>
					
					<?php
					// VÈrifie si il y a des Ètapes sinon "aucune info".
					$sql = "SELECT etpid FROM etape,tournee WHERE etape.TRNNUM=$TRNNUM ORDER BY ETPID DESC;";
					$result = executeSQL($sql);
					$results = tableSQL($sql);
					
					$i=0;
					foreach ($results as $ligne) {
						//on extrait chaque valeur de la ligne courante
						$ETPID = $ligne[0];
					}
					
					if (empty($ETPID)) {
						echo "
			    		<th>Aucune information...</th>";
					} else {
					
						$depart_sql = "SELECT etape.LIEUID,LIEUNOM FROM lieu,etape WHERE etape.TRNNUM=$TRNNUM AND ETPID=$ETPID AND lieu.LIEUID=etape.LIEUID";
						$depart = executeSQL($depart_sql);
						$cptDepart = compteSQL($depart_sql);
						$depart = tableSQL($depart_sql);
			
						if ($cptDepart>0) {
							foreach ($depart as $ligne) {
							//on extrait chaque valeur de la ligne courante
								$LIEUID = $ligne[0];
								$depart = $ligne[1];
							}
							?>
								<th><?php echo $depart; ?></th>
							<?php
						} else {
						?>
							<th>Aucune information...</th>
						<?php
						}
					}
					
					// VÈrifie si il y a des Ètapes sinon "aucune info".
					$sql = "SELECT etpid FROM etape,tournee WHERE etape.TRNNUM=$TRNNUM;";
					$result = executeSQL($sql);
					$results = tableSQL($sql);
						
					$i=0;
					foreach ($results as $ligne) {
						//on extrait chaque valeur de la ligne courante
						$ETPID = $ligne[0];
					}
						
					if (empty($ETPID)) {
						echo "
			    		<th>Aucune information...</th>";
					} else {
							
						$arrivee_sql = "SELECT etape.LIEUID,LIEUNOM FROM lieu,etape WHERE etape.TRNNUM=$TRNNUM AND ETPID=$ETPID AND lieu.LIEUID=etape.LIEUID;";
						$arrivee = executeSQL($arrivee_sql);
						$cptArrivee = compteSQL($arrivee_sql);
						$arrivee = tableSQL($arrivee_sql);
		
						if ($cptArrivee>0) {
							foreach ($arrivee as $ligne) {
							//on extrait chaque valeur de la ligne courante
								$LIEUID = $ligne[0];
								$arrivee = $ligne[1];
							}
							?>
							<th><?php echo $arrivee; ?></th>
							<?php
						} else {
						?>
							<th>Aucune information...</th>
						<?php
						}
					
					}
					
					echo "<th> <a href=\"efface.php?id=$TRNNUM\"> <img src=\"images/delete.png\" title=\"Supprimer...\" /></a></th>";
						
					echo "<th> <a href=\"Modifier_les_tournees.php?id=$TRNNUM\"> <img src=\"images/edit.png\" title=\"Modifier...\" /></a></th>";
					?>	
			
					</tr>
				<?php
				}
			
				} else {
				?>
				<tr class=\"odd\">
		
		<th>Aucune information...</th>
			
		</tr>
				<?php
				}
				?>
			
			
				</tbody>

		</table>	
			<br></br>
			<input id="add" type="button" name="add" value="Ajouter"  onclick="location.href='Organiser_les_tournees.php'" />
			<input id="back" type="button" name="retour" value="Retour" onclick="location.href='tableau_de_donnees.php'" />
	
	</body>
</html>