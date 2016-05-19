<?php 
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>organiser une &eacute;tape</title>
			<link href="modifier_une_etape.css" rel="stylesheet">
			<?php include 'head.php' ?>
			<link href="calendrier.css" rel="stylesheet">
			
			
		</head>

	<body>
				<p>Organiser les tourn&eacute;es - Tourn&eacute;e 
					<?php include 'connectAD.php';
					//Récupération du numéro de tournée par l'URL id.
					$TRNNUM=$_SESSION['TRNNUM'];
					$_SESSION['TRNNUM']=$TRNNUM;
					echo $TRNNUM;
				
					?> Etape <?php
				 if (empty($_GET['id'])) {
				 	$ETPID=$_SESSION['ETPID'];
				 	$_SESSION['ETPID']=$ETPID;
				 } else {
				 	$ETPID=$_GET['id'];
				 	$_SESSION['ETPID']=$ETPID;
				 }
					echo $ETPID;?>
				</p>
				
				<?php 
				$TRNNUM=$_SESSION['TRNNUM'];
				$ETPID=$_SESSION['ETPID'];
				$date_prise_en_charge=date('d/m/Y');
				$_SESSION['date_prise_en_charge']=$date_prise_en_charge;
				
				$sql="SELECT ETPID,LIEUID,ETPHREDEBUT,ETPHREFIN FROM etape where TRNNUM=$TRNNUM AND ETPID=$ETPID;";
				$results = tableSQL($sql);
				
				echo "<table id=\"affichetableau\">";
				echo "<tbody>";
				
				foreach ($results as $ligne) {
					//on extrait chaque valeur de la ligne courante
					$ETPID = $ligne[0];
					$lieu = $ligne[1];
					$heure_rdv_tot = $ligne[2];
					$heure_rdv_tard = $ligne[3];
				
				}
				$lieu_SAVE=$lieu;
				$_SESSION['ETPID']=$ETPID;
				$heure_rdv_tot=substr($heure_rdv_tot,11,19);
				$heure_rdv_tard=substr($heure_rdv_tard,11,19);
				
				// Recherche le nom du lieu.
				$sql = "SELECT LIEUID,LIEUNOM,VILID FROM lieu WHERE LIEUID=\"$lieu\";";
				$result = executeSQL($sql);
				$results = tableSQL($sql);
				
				foreach ($results as $ligne) {
						//on extrait chaque valeur de la ligne courante de chaque lieu
						//lieu doit correspondre a chaque id /!\
						$lieu = $ligne[0];
						$LIEUNOM = $ligne[1];
						$VILID = $ligne[2];
				}
				
				// Recherche le nom de la ville
				$sql = "SELECT VILID,VILNOM FROM commune WHERE VILID=\"$VILID\";";
				$result = executeSQL($sql);
				$results = tableSQL($sql);
				
				foreach ($results as $ligne) {
					//on extrait chaque valeur de la ligne courante de chaque ville
					//ville doit correspondre a chaque id /!\
					$VILID = $ligne[0];
					$VILNOM = $ligne[1];
				}
				$_SESSION['LIEUID']=$lieu;
				?>
	
		<div id="bords">
		<br/>
		<form action ="modifier_etape.php" method="get" id="Formulaire">
			<fieldset>
			<div id="titre1">Arrivé sur l'étape :</div>
			<div id="lieuPos">
				<?php echo $LIEUNOM." (".$VILNOM.")";?>
			</div>
			<br/>
			<br/>
			<div id="titre2">Le</div>
			<div id="contenue1">	
				<input id="date_prise_en_charge" name="date_prise_en_charge" type="text" value="<?php echo "$date_prise_en_charge";?>" class="calendrier" size="8"></input>
			</div>
			<div id="titre4">à</div>
			<div id="contenue2">
				<input id="heure_rdv_tot" name="heure_rdv_tot" type="text" size="5" maxlength="8" value="<?php echo "$heure_rdv_tot";?>"  />
			</div>			
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			<br/>	
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			<br/>
			<div id="titre1">Fin de l'étape :</div>
			<br/>
			<div id="titre2">Le</div>
			<div id="contenue1">
			<input id="date_prise_en_charge" name="date_prise_en_charge" type="text" value="<?php echo "$date_prise_en_charge";?>" class="calendrier" size="8"></input>
			</div>
			<div id="titre4">à</div>
			<div id="contenue2">
				<input id="heure_rdv_tard" name="heure_rdv_tard" type="text" size="5" maxlength="8" value="<?php echo "$heure_rdv_tard";?>"  />
			</div>		
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>	
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
		<br/>
		<br/>
		<br/>
		<div id="titre1">Palette(s) :</div>
		<br/>
		<div id="titre2">Livrée :</div>
		<div id="contenue3">
		<input id="ETPNBPALLIV" name="ETPNBPALLIV" type="text" size="4" maxlength="4" value="0"  />
		</div>
		<div id="titre3">dont EUR : </div>
		<div id="contenue4">
		<input id="ETPNBPALLIVEUR" name="ETPNBPALLIVEUR" type="text" size="4" maxlength="4" value="0"  />
		</div>
		<br/><br/>
		<div id="titre2">Chargée : </div>
		<div id="contenue3">
		<input id="ETPNBPALCHARG" name="ETPNBPALCHARG" type="text" size="4" maxlength="4" value="0"  />
		</div>
		<div id="titre3">dont EUR : </div>
		<div id="contenue4">
		<input id="ETPNBPALCHARGEUR" name="ETPNBPALCHARGEUR" type="text" size="4" maxlength="4" value="0"  />
		</div>
		<br/><br/>
		<div id="titre2">Chèque : </div>
		<div id="contenue3">
		<input id="ETPCHQ" name="ETPCHQ" type="text" size="4" maxlength="4" value="0"  />
		</div>
		<br/><br/>
		<div id="titre2">Kms Compteur </div>
		<div id="contenue5">
		<input id="ETPKM" name="ETPKM" type="text" size="15" maxlength="8" value="0"  />
		</div>
		<br/><br/>
		<div id="titre2">Etat </div>
		<select size="1" name="ETPETATLIV" id="ETPETATLIV">
			<option value=CONFORME selected="selected">CONFORME</option>
			<option value=NONCONFORME>NON CONFORME</option>
		</select>
		<br/><br/>
		<div class="commentaire">
			<label for="commentaire">Commentaire(s) :</label><br/>
			<textarea id="commentaire" name="commentaire" type="text" value=""></textarea>
				
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
				
		</div>

			<br/><br/><br/><br/><br/>

			<input id="valider" name="valider" type="submit" value="Valider" title="valider"></input>
			</fieldset>
		</form>
		<form action ="Modifier_les_tournees.php" method="get" id="Formulaire">
				<input id="retour" name="retour" type="submit" value="Retour" title="retour"></input>
		</form>
		<form action ="Modifier_les_tournees.php" method="get" id="Formulaire">
				<input id="photo" name="photo" type="submit" value="Prendre une photo" title="photo"></input>
		</form>
		</div>
	</body>
</html>