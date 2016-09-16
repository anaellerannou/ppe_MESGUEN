<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	
	//on récupère les variables issue du formulaire
	$TRNDTE=$_GET['TRNDTE'];
	
		$tabDate = explode('/', $TRNDTE);
	$sqldate = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
	
	echo "*".$sqldate."*";
	
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
	
	include '../connectAD.php';
	
	
	
	

	
	if (empty($date)) {
		
		$sql= "SET FOREIGN_KEY_CHECKS = 0";
		echo "SQL : $sql<br/>";
		$result = executeSQL($sql);

		$sql2 = "INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('$TRNNUM','$sqldate', '$CHFID', '$VEHIMMAT', '$TRNARCHAUFFEUR', '$TRNCOMMENTAIRE');";
		$result2 = executeSQL($sql2);
		
		$sql3= "SET FOREIGN_KEY_CHECKS = 1";
		echo "SQL : $sql3<br/>";
		$result3 = executeSQL($sql3);
		
		if ($result)
			echo "<meta http-equiv='refresh' content='0;url=tableau_de_donnees.php?message=<font color=green> Ajout realise </font>'>";
		else
			echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Probleme d'insertion... </font>'>";
		
	} else 
		echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message=<font color=red> Vous ne devez pas mettre d espace... </font>'>"
	
			
		
?>

