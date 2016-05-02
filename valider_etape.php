<?php
/*
CREATE TABLE IF NOT EXISTS `test` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `info` char(20) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/

	include 'connectAD.php';

	//on recupere les variable issue du formulaire
	
	//pour l'instant n'affiche que un trnnum (par ex 1) associe à un 1 : $etpid=11

	$lieu=$_GET['lieu'];
	$heure_rdv_tot=$_GET['heure_rdv_tot'];
	$heure_rdv_tard=$_GET['heure_rdv_tard'];
	$commentaire=$_GET['commentaire'];
	$date_prise_en_charge=$_GET['date_prise_en_charge'];
	
	//supprime les blancs devant et derrière la chaine
	
	$commentaire=trim($commentaire);
	
	$tabDate = explode('/', $date_prise_en_charge);
	$sqlDate = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];

	
		
	
	$sql = "UPDATE `mesguen`.`etape` SET `LIEUID` = '$lieu', `ETPCOMMENTAIRE` = '$commentaire', `ETPHREDEBUT` = '$sqlDate $heure_rdv_tot', `ETPHREFIN` = '$sqlDate $heure_rdv_tard' WHERE `etape`.`TRNNUM` = '1' AND `etape`.`ETPID` = '1';";
	$sql2 = "UPDATE `mesguen`.`tournee` SET `TRNPECCHAUFFEUR` = '$sqlDate' WHERE `tournee`.`TRNNUM` = '1'";
	;
	echo "<br />sql etape : $sql <br /><br /> sql tournee : $sql2 <br />";

	$result = executeSQL($sql);
	$result2 = executeSQL($sql2);
	
	deconnexion();
?>