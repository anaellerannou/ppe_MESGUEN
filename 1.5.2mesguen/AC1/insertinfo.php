<?php
	// On d�marre la session AVANT d'�crire du code HTML
	session_start();
	
	//on r�cup�re les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	
	//	$tabDate = explode('/', $TRNDTE);
	//$sqldate = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
	
	$CHFID=$_GET['CHFID'];
	$VEHIMMAT=$_GET['VEHIMMAT'];
	$TRNARCHAUFFEUR=$_GET['TRNARCHAUFFEUR'];
	$Heures=$_GET['Heures'];
	$TRNARCHAUFFEUR=$TRNARCHAUFFEUR.' '.$Heures;
	$TRNCOMMENTAIRE=$_GET['TRNCOMMENTAIRE'];
	
	//supprime les blancs devant et derri�re la chaine
	$TRNDTE=trim($TRNDTE);
	$CHFID=trim($CHFID);
	$VEHIMMAT=trim($VEHIMMAT);
	
	include '../connectAD.php';
	
	$sql0 = 'SELECT max( convert( `TRNNUM` , signed integer ) ) +1 FROM `tournee` ';
	$TRNNUM = champSQL ($sql0);
	

	
	if (!empty($TRNDTE)) {
		
		$sql= "SET FOREIGN_KEY_CHECKS = 0";
		$result = executeSQL($sql);

		$sql2 = "INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('$TRNNUM','$TRNDTE', '$CHFID', '$VEHIMMAT', '$TRNARCHAUFFEUR', '$TRNCOMMENTAIRE');";
		$result2 = executeSQL($sql2);
		
		$sql3= "SET FOREIGN_KEY_CHECKS = 1";
		$result3 = executeSQL($sql3);
		
	
		
	if ($result)
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?id=$TRNNUM&message=<font color=green> Ajout realise </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
			
		
?>

