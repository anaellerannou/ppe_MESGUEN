<?php
	include '../connectAD.php';

	//on recupere les varirable issue du formulaire
	$TRNNUM=$_GET['id'];
	
	$sql = "DELETE FROM etape WHERE TRNNUM=\"$TRNNUM\"";
	$result = executeSQL($sql);
	
	$sql = "DELETE FROM tournee WHERE TRNNUM=\"$TRNNUM\"";
	$result = executeSQL($sql);

 	if ($result)
            echo "<meta http-equiv='refresh' content='0;url=tableau_de_donnees.php?message2=<font color=green> Suppression realise... </font>'>";
        else
            echo "<meta http-equiv='refresh' content='0;url=tableau_de_donnees.php?message2=<font color=red> Probleme insertion... </font>'>";

		
?>