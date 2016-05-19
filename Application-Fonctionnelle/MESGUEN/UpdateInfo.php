<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();

	//on récupère les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	$CHFID=$_GET['CHFID'];
	$VEHIMMAT=$_GET['VEHIMMAT'];
	$TRNARCHAUFFEUR=$_GET['TRNARCHAUFFEUR'];
	$Heures=$_GET['Heures'];
	$TRNARCHAUFFEUR=$TRNARCHAUFFEUR.' '.$Heures;
	$TRNCOMMENTAIRE=$_GET['TRNCOMMENTAIRE'];
	$TRNNUM=$_SESSION['TRNNUM'];
	//supprime les blancs devant et derrière la chaine
	$TRNDTE=trim($TRNDTE);
	$CHFID=trim($CHFID);
	$VEHIMMAT=trim($VEHIMMAT);
	
	include 'connectAD.php';
	
	if (empty($date)) {

		$sql = "UPDATE tournee SET `TRNNUM` = '$TRNNUM', `TRNDTE` = '$TRNDTE', `CHFID` = '$CHFID', `VEHIMMAT` = '$VEHIMMAT', `TRNARCHAUFFEUR` = '$TRNARCHAUFFEUR', `TRNCOMMENTAIRE` = '$TRNCOMMENTAIRE' WHERE `tournee`.`TRNNUM` = '$TRNNUM';";
		
		$result = executeSQL($sql);
		
		if ($result)
			echo "<meta http-equiv='refresh' content='0;url=tableau_de_donnees.php?message=<font color=green> Modification realisée </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
?>