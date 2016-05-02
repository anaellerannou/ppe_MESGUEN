<?php
	//on récupère les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	$CHFID=$_GET['CHFID'];
	$VEHIMMAT=$_GET['VEHIMMAT'];
	$PrisEnChargeLe=$_GET['PrisEnChargeLe'];
	$TRNCOMMENTAIRE=$_GET['TRNCOMMENTAIRE'];
	//supprime les blancs devant et derrière la chaine
	$TRNDTE=trim($TRNDTE);
	$CHFID=trim($CHFID);
	$VEHIMMAT=trim($VEHIMMAT);
	
	if (empty($date)) {
		include 'connectAD.php';

		$sql = "INSERT INTO tournee (TRNDTE, CHFID, VEHIMMAT, PrisEnChargeLe, TRNCOMMENTAIRE) VALUES ('$TRNDTE', '.$CHFID.', '.$VEHIMMAT.', '$PrisEnChargeLe', '.$TRNCOMMENTAIRE.');";
		$result = executeSQL($connexion,$sql);
		
		if ($result)
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=green> Ajout realise </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
?>

