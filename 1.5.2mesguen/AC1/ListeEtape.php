<?php
	
	$sql="SELECT ETPID,LIEUNOM FROM etape,lieu where etape.LIEUID=lieu.LIEUID AND TRNNUM=\"$TRNNUM\" ORDER BY ETPID;";
	$cptEtape = compteSQL($sql);
	$results = tableSQL($sql);	
	
	echo "<table id=\"affichetableau\">";
	echo "<tbody>";
	
	$cpt=0;
	
	if ($cptEtape>0) {
		foreach ($results as $ligne) {
			//on extrait chaque valeur de la ligne courante
			$ETPID = $ligne[0];
			$LIEUNOM = $ligne[1];

			$cpt++;
			if ($cpt %2 == 0) 
				echo "<tr class=\"even\">"; 
			else 
				echo "<tr class=\"odd\">";
				
			
			echo "<td width=\"15%\">".$ETPID."</td>";
		
			echo "<td width=\"25%\">".$LIEUNOM."</td>";
		
			echo "<td width=\"32\"> <a href=\"supprimeEtape.php?id=$ETPID\"> <img src=\"../images/delete.png\" title=\"Supprimer...\" /></a></td>";
			
			echo "<td width=\"32\"> <a href=\"modifier_une_etape.php?id=$ETPID\"> <img src=\"../images/edit.png\" title=\"Modifier...\" /></a></td>";
			
		
			echo "</tr>";
		}
		
	} else {
		
		echo "<tr class=\"odd\">";
			
		echo "<td width=\"100%\">Aucune information...</td>";
		
		echo "</tr>";
		
	}
	
	
	
		echo "</tbody>
		</table> ";


?>