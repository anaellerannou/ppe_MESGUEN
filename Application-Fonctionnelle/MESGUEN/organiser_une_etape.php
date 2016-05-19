<?php 
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>organiser une &eacute;tape</title>
			<link href="organiser_une_etape.css" rel="stylesheet">
			<?php include 'head.php' ?>
			<link href="calendrier.css" rel="stylesheet">
			
			
		</head>

	<body>
				<p>Organiser les tourn&eacute;es - Tourn&eacute;e 
				<?php include 'connectAD.php';
				//Récupération du numéro de tournée par l'URL id.
				$Heures=date('H').'H'.date('i');
				$Date=date('d/m/Y');
				$trnnum=$_GET['id'];
				$_SESSION['TRNNUM']=$trnnum;
				echo $trnnum;
				$sql = "SELECT `TRNNUM` FROM `tournee` WHERE `TRNNUM` ='.$trnnum.'; ";
				$result = champSQL($sql)  ;
				
				 ?> Etape <?php
				 $sql = "SELECT etpid FROM etape WHERE TRNNUM=$trnnum;";
				 $result = executeSQL($sql);
				 $results = tableSQL($sql);
				 
				 $i=0;
				 foreach ($results as $ligne) {
				 	//on extrait chaque valeur de la ligne courante
				 	$etpid = $ligne[0];
				 	$i++;
				 }
				 $i+=1;
				 $etpid=$i;
				 $_SESSION['ETPID']=$etpid;
				 $sql2 = 'SELECT `ETPID` FROM `etape` WHERE `ETPID`='.$etpid.';';
				 $result2 = champSQL ($sql2);
				 echo $etpid; ?></p>
	
		<br/><br/>
		<form action ="valider_etape.php" method="get" id="Formulaire">
			<fieldset>
		<div class='lieu'>
			<label for='lieu'>Lieu </label>
			
				<select name='lieu' size=1 >
				
				<?php 
				// Liste déroulante lieux
				$sql3 = 'SELECT `LIEUID` , `LIEUNOM` FROM `lieu` ';
				$cpt = compteSQL($sql3);
				$results = tableSQL($sql3);
				
				if ($cpt>0) {
					foreach ($results as $ligne) {
						//on extrait chaque valeur de la ligne courante de chaque lieu
						//lieu doit correspondre a chaque id /!\
						
						$lieu = $ligne[0];
						$info = $ligne[1];
						//on affiche la ligne courante dans le select
						echo '<option value='.$lieu.' >'.$info.'</option>';
					}
					} else {
					echo '<option>Aucune information...</option>';
					}
					?>	
					
				</select>
				
				
				<?php
				if (isset($_GET['message']))
					echo $_GET['message'];
				else
					echo "&nbsp;";							
				?>
		</div>
		<br/>
			<!-- Calendrier -->
			<div id="date_prise_en_charge">
				<label for="date_prise_en_charge">Pris en charge le</label>
				<input id="date_prise_en_charge" name="date_prise_en_charge" type="text" value="<?php echo $Date;?>" class="calendrier" size="20"></input>
				<br/><br/>
				<label for="Heure">à</label>
				<input type="text" name="Heure" id="Heure" size="10" maxlength="5" value="<?php echo $Heures;?>"/>
						
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tot">
				<label for="heure_rdv_tot">Rendez-vous entre</label>
				<input id="heure_rdv_tot" name="heure_rdv_tot" type="text" size="20" maxlength="8" value="00:00:00"  />
																							
			
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tard">
				<label for="heure_rdv_tard">et </label>
				<input id="heure_rdv_tard" name="heure_rdv_tard" type="text" size="20" maxlength="8" value="00:00:00"   />
			
			
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";   
    		?>
			
			</div>

			<br/>

			
	
			<div class="commentaire">
				<label for="commentaire">Commentaire</label>
				<textarea id="commentaire" name="commentaire" type="text" value=""></textarea>
				
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
				
			</div>

			<br/><br/><br/><br/><br/>

			<input id="valider" name="valider" type="image" value="Valider" title="valider" src="images/valider.png"></input>
			</fieldset>
		</form>
		<form action ="Modifier_les_tournees.php" method="get" id="Formulaire">
				<input id="annuler" name="annuler" type="image" value="Annuler" title="annuler" src="images/deleteV2.png"></input>
		</form>
	</body>
</html>