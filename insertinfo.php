<?php
	//on récupère les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	$CHFID=$_GET['CHFID'];
	$VEHIMMAT=$_GET['VEHIMMAT'];
	$TRNPECCHAUFFEUR=$_GET['TRNPECCHAUFFEUR'];
	$TRNCOMMENTAIRE=$_GET['TRNCOMMENTAIRE'];
	//supprime les blancs devant et derrière la chaine
	$TRNDTE=trim($TRNDTE);
	$CHFID=trim($CHFID);
	$VEHIMMAT=trim($VEHIMMAT);
	
	include 'connect.php';
	
	$sql = "SELECT TRNNUM FROM tournee";
	$result = mysql_query($sql)
	or die("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
	
	$i=0;
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		echo $row[0]." - ".$row[1]."<br />";
		$i++;
	}
	$i+=1;
	$row+=1;
		
	
	if (empty($date)) {
		include 'connectAD.php';

		$sql = "INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNPECCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('$i','$TRNDTE', \"$CHFID\", \"$VEHIMMAT\", '$TRNPECCHAUFFEUR', '.$TRNCOMMENTAIRE.');";
		$result = executeSQL($connexion,$sql);
		
		if ($result)
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=green> Ajout realise </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
?>

