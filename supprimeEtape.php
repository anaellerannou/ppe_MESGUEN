<?php
	include 'connectAD.php';

	//on recupere les varirable issue du formulaire
	$ETPID=$_GET['id'];
	$sql = "DELETE FROM etape WHERE ETPID=\"$ETPID\"";

	$result = executeSQL($connexion,$sql);

 	if ($result)
            echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message2=<font color=green> Suppression realise... </font>'>";
        else
            echo "<meta http-equiv='refresh' content='0;url=Organiser_les_tournees.php?message2=<font color=red> Probleme insertion... </font>'>";

		
?>