<?php
	// On d�marre la session AVANT d'�crire du code HTML
	session_start();

	//on r�cup�re les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	$CHFID=$_GET['CHFID'];
	$VEHIMMAT=$_GET['VEHIMMAT'];
	$TRNARCHAUFFEUR=$_GET['TRNARCHAUFFEUR'];
	$Heures=$_GET['Heures'];
	$TRNARCHAUFFEUR=$TRNARCHAUFFEUR.' '.$Heures;
	$TRNCOMMENTAIRE=$_GET['TRNCOMMENTAIRE'];
	$TRNNUM=$_SESSION['TRNNUM'];
	//supprime les blancs devant et derri�re la chaine
	$TRNDTE=trim($TRNDTE);
	$CHFID=trim($CHFID);
	$VEHIMMAT=trim($VEHIMMAT);
	
	include '../connectAD.php';
	
	if (empty($date)) {

		$sql= "SET FOREIGN_KEY_CHECKS = 0";
		echo "SQL : $sql<br/>";
		$result = executeSQL($sql);
		
		$sql2 = "UPDATE tournee SET `TRNNUM` = '$TRNNUM', `TRNDTE` = '$TRNDTE', `CHFID` = '$CHFID', `VEHIMMAT` = '$VEHIMMAT', `TRNARCHAUFFEUR` = '$TRNARCHAUFFEUR', `TRNCOMMENTAIRE` = '$TRNCOMMENTAIRE' WHERE `tournee`.`TRNNUM` = '$TRNNUM';";
		
		$result = executeSQL($sql2);
		
		$sql3= "SET FOREIGN_KEY_CHECKS = 1";
		echo "SQL : $sql3<br/>";
		$result3 = executeSQL($sql3);
		
		if ($result)
			echo "<meta http-equiv='refresh' content='0;url=tableau_de_donnees.php?message=<font color=green> Modification realis�e </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
?>