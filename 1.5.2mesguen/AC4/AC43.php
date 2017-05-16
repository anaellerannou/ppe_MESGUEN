<?php 
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>&eacute;tape</title>
			
			<?php include '../head.php' ;
				include '../connectAD.php'?>
			<link href="calendrier.css" rel="stylesheet">
			<link href="AC43.css" rel="stylesheet">
			
			
		</head>

	<body>
	
	<form id="AC43" action="modifier_etape.php">
	
	<p>Arrivé sur l'étape : LCM LE RHEU (RHEU (LE)) </p>
	<?php
	 
	$ETPID=1;
	$TRNNUM=5;
	
	 
	
	/*$sql="SELECT `LIEUNOM`
FROM `etape` , `lieu`
WHERE `TRNNUM` =5
AND `ETPID` =1
AND `etape`.`LIEUID` = `lieu`.`LIEUID` ";
	echo $sql;
	$result = executeSQL($sql);
	echo $result;*/
	
	//erreur resource id#7
	
	?>
	
		
	
			<fieldset>
	
			
	
				<label for='dte_deb_etp'>Le </label>
				
				<input id="dte_deb_etp" name="dte_deb_etp" type="text" value="00-00-00" class="calendrier" size="20"></input>
				
			
				<label id="hre_deb_etp2" for='hre_deb_etp'>à </label>
				
				<input id="hre_deb_etp" name="hre_deb_etp" type="text" value="00:00:00"  size="20"></input>
			
				<br /><br /><br/>
			
	
	
		<h1>Fin de l'&eacute;tape</h1>
	
				<label for='dte_fin_etp'>Le </label>
				
				<input id="dte_fin_etp" name="dte_fin_etp" type="text" value="00-00-00" class="calendrier" size="20"></input>
				
							
			
				<label id="hre_fin_etp2" for='hre_fin_etp2'>à </label>
				
				<input id="hre_fin_etp" name="hre_fin_etp" type="text" value="00:00:00"  size="20"></input>
				
				<br />
				<br />
				<br/>
			
			
		<h1>Palette(s) : </h1>
	
				<label for='ETPNBPALLIV'> Livrée : </label>
				
				<input id="ETPNBPALLIV" name="ETPNBPALLIV" type="text" value=""  size="20"></input>
			
				
				<!-- on a créé une nouvelle table avec les bonnes caractéristiques dans la bdd ETPNBPALEURO_LIV-->
				
				<label id="ETPNBPALEURO_LIV2" for='ETPNBPALEURO_LIV'>dont EUR </label>
				
				<input id="ETPNBPALEURO_LIV" name="ETPNBPALEURO_LIV" type="text" value=""  size="20"></input>
				
				<br/><br/>
				
				<label for='ETPNBPALCHARG'> Chargée : </label>
				
				<input id="ETPNBPALCHARG" name="ETPNBPALCHARG" type="text" value=""  size="20"></input>
				
				
				
				<!-- on a créé une nouvelle table avec les bonnes caractéristiques dans la bdd ETPNBPALEURO_CHARG-->
				<label id="ETPNBPALEURO_CHARG2" for='ETPNBPALEURO_CHARG'> dont EUR : </label>
				
				<input id="ETPNBPALEURO_CHARG" name="ETPNBPALEURO_CHARG" type="text" value=""  size="20"></input>
				
				<br/><br/>
				
				<label for='ETPCHEQUE'>Cheque : </label>
				
				<input id="ETPCHEQUE" name="ETPCHEQUE" type="text" value=""  size="20"></input>
				
				<br/><br/>
				
				<label for='ETPETATLIV'>Etat </label>
				
				<select name='ETPETATLIV'>
				
					<option value='CONFORME'>CONFORME</option>
					<option value='non_conforme'>Non_conforme</option>
				
				</select>
				
				<br/><br/>
				
				<label for='ETPCOMMENTAIRE'>Commentaire(s) : </label>
				<textarea id="ETPCOMMENTAIRE" name="ETPCOMMENTAIRE" type="text" value=""></textarea>
				
				<br/><br/><br/><br/>
				
	
			</fieldset>
			
			
			
			<input id="back" type="button" name="retour" value="Retour" onclick="location.href='../AC1/Organiser_les_tournees.php'"/>
			<input id="photo" type="button" name="photo" value="Prendre une photo"  onclick="location.href='AC43.php'" />
			<input id="add" type="submit" name="add" value="Valider"  onclick="location.href='AC43.php'"/>
	
		</form>
	
	
	
	</body>
	
	</html>
	