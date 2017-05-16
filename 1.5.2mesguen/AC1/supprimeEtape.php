<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

	include '..\connectAD.php';

	//on recupere les varirable issue du formulaire
	$ETPID=$_GET['id'];
	$TRNNUM=$_SESSION['TRNNUM'];
	$sql = "DELETE FROM etape WHERE ETPID=\"$ETPID\" AND TRNNUM=\"$TRNNUM\"";

	$result = executeSQL($sql);

 	if ($result)
            echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=green> Suppression realise... </font>'>";
        else
            echo "<meta http-equiv='refresh' content='0;url=Modifier_les_tournees.php?message2=<font color=red> Probleme insertion... </font>'>";

		
?>