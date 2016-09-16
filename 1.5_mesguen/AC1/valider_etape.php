<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

/*
CREATE TABLE IF NOT EXISTS `test` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `info` char(20) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
	include '../connectAD.php';
	//on recupere les variable issue du formulaire
	
	//pour l'instant n'affiche que un trnnum (par ex 1) associe à un 1 : $etpid=11
	$lieu=$_GET['lieu'];
	$heure_rdv_tot=$_GET['heure_rdv_tot'];
	$heure_rdv_tard=$_GET['heure_rdv_tard'];
	$commentaire=$_GET['commentaire'];
	$date_prise_en_charge=$_GET['date_prise_en_charge'];
	$TRNNUM=$_SESSION['TRNNUM'];
	$ETPID=$_SESSION['ETPID'];
	$Heure=$_GET['Heure'];
	$TRNARCHAUFFEUR=$date_prise_en_charge.' '.$Heure;
	
	//supprime les blancs devant et derrière la chaine
	
	$commentaire=trim($commentaire);	

	$tabDate = explode('/', $date_prise_en_charge);
	$sqlDate = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
	
	$sql = "INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('$TRNNUM','$ETPID','$lieu', \"$commentaire\", \"$sqlDate $heure_rdv_tot\", '$sqlDate $heure_rdv_tard');";
	$sql2 = "UPDATE `mesguen`.`tournee` SET `TRNARCHAUFFEUR` = '$TRNARCHAUFFEUR' WHERE `tournee`.`TRNNUM` = '$TRNNUM'";
	
	echo "<br />sql etape : $sql <br /><br />";
	$result = executeSQL($sql);
	echo "<br />sql etape : $sql2 <br /><br />";
	$result2 = executeSQL($sql2);
	
	if ($result) {
		if ($result2) {
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=green> Ajout realisée </font>'>";
		} else {
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=red> Probleme d'insertion... </font>'>";
		}
	} else {
		echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=red> Problème d'insertion... </font>'>";
	}
	deconnexion();
?>