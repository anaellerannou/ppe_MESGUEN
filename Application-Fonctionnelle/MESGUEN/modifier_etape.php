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
	include 'connectAD.php';
	//on recupere les variable issue du formulaire
	
	//pour l'instant n'affiche que un trnnum (par ex 1) associe à un 1 : $etpid=11
	$lieu=$_SESSION['LIEUID'];
	$heure_rdv_tot=$_GET['heure_rdv_tot'];
	$heure_rdv_tard=$_GET['heure_rdv_tard'];
	$commentaire=$_GET['commentaire'];
	$TRNNUM=$_SESSION['TRNNUM'];
	$ETPID=$_SESSION['ETPID'];
	$_SESSION=$TRNNUM['TRNNUM'];
	$_SESSION=$ETPID['ETPID'];
	$Heure=date('H').'H'.date('i');
	$date_prise_en_charge=$_GET['date_prise_en_charge'];
	$ETPNBPALLIV=$_GET['ETPNBPALLIV'];
	$ETPNBPALLIVEUR=$_GET['ETPNBPALLIVEUR'];
	$ETPNBPALCHARG=$_GET['ETPNBPALCHARG'];
	$ETPNBPALCHARGEUR=$_GET['ETPNBPALCHARGEUR'];
	$ETPKM=$_GET['ETPKM'];
	$ETPETATLIV=$_GET['ETPETATLIV'];
	$ETPCHQ=$_GET['ETPCHQ'];
	$TRNARCHAUFFEUR=$date_prise_en_charge.' '.$Heure;
	
	//supprime les blancs devant et derrière la chaine
	
	$commentaire=trim($commentaire);
	
	$tabDate = explode('/', $date_prise_en_charge);
	$sqlDate = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
		
	if ($ETPNBPALLIV<$ETPNBPALLIVEUR) {
		echo "<meta http-equiv='refresh' content='0;url=valider_une_etape.php?message4=<font color=red>Le nombre de palettes européennes doit être inférieur au nombre de palettes totales</font>'>";
	} else {
		if ($ETPNBPALCHARG < $ETPNBPALCHARGEUR) {
			echo "<meta http-equiv='refresh' content='0;url=valider_une_etape.php?message4=<font color=red>Le nombre de palettes européennes doit être inférieur au nombre de palettes totales</font>'>";
		}
	$sql = "UPDATE `mesguen`.`etape` SET `LIEUID` = '$lieu', `ETPCOMMENTAIRE` = '$commentaire', `ETPHREDEBUT` = '$sqlDate $heure_rdv_tot', `ETPHREFIN` = '$sqlDate $heure_rdv_tard', ETPNBPALLIV = '$ETPNBPALLIV', ETPNBPALLIVEUR = '$ETPNBPALLIVEUR', ETPNBPALCHARG = '$ETPNBPALCHARG', ETPNBPALCHARGEUR = '$ETPNBPALCHARGEUR', ETPCHQ = '$ETPCHQ', ETPKM = '$ETPKM', ETPKM = '$ETPKM', ETPETATLIV = '$ETPETATLIV' WHERE `etape`.`TRNNUM` = '$TRNNUM' AND `etape`.`ETPID` = '$ETPID';";
	$sql2 = "UPDATE `mesguen`.`tournee` SET `TRNARCHAUFFEUR` = '$TRNARCHAUFFEUR' WHERE `tournee`.`TRNNUM` = '$TRNNUM'";
	
	echo "<br />sql etape : $sql <br /><br />";
	$result = executeSQL($sql);
	echo "<br />sql etape : $sql2 <br /><br />";
	$result2 = executeSQL($sql2);
	
		if ($result) {
			if ($result2) {
				echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=green> Modification realisée </font>'>";
			} else {
				echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=red> Probleme d'insertion... </font>'>";
			}
		} else {
			echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=red> Problème d'insertion... </font>'>";
		}
	}
	deconnexion();
?>