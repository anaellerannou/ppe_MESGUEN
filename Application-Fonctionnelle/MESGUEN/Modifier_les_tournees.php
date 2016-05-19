<?php 
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include 'head.php';
		?>
	</head>
	
	<?php
		include 'connectAD.php';
		if (empty($_GET['id'])) {
			$TRNNUM=$_SESSION['TRNNUM'];
			$_SESSION['TRNNUM']=$TRNNUM;
		} else {
			$TRNNUM=$_GET['id'];
			$_SESSION['TRNNUM']=$TRNNUM;
		}
		
		$sql="SELECT TRNNUM,VEHIMMAT,CHFID,TRNDTE FROM tournee where TRNNUM=$TRNNUM;";
		$results = tableSQL($sql);
		
		echo "<table id=\"affichetableau\">";
		echo "<tbody>";
		
			foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
				$TRNNUM = $ligne[0];
				$VEHIMMAT = $ligne[1];
				$CHFID = $ligne[2];
				$TRNDTE = $ligne[3];

			}
			$VEHIMMAT_SAVE=$VEHIMMAT;
			$CHFID_SAVE=$CHFID;
			
		$sql="SELECT CHFID,CHFNOM FROM chauffeur where CHFID=$CHFID;";
		$results = tableSQL($sql);
			
		echo "<table id=\"affichetableau\">";
		echo "<tbody>";
			
			foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
				$CHFID = $ligne[0];
				$CHFNOM = $ligne[1];
			
			}
			
		$Heures=date('H').'H'.date('i');
		$Date=date('d/m/Y');
	?>
	
	<body>
		<h1><a id="logo">Application Chauffeur</a></h1>
		<hr/>
		<form id='formulairetest' action ='UpdateInfo.php' method='get'>	
			<label for="TRNDTE"></label><br/>
			Date <input type="text" name="TRNDTE" id="TRNDTE" class="calendrier" value="<?php echo $TRNDTE; ?>" size="10" maxlength="10"/>
			<br/>
			<label for="CHFID"></label><br/>
			Chauffeur 
			<?php	
			$sql = "SELECT * FROM chauffeur ORDER BY CHFNOM;"; 
			$result = executeSQL($sql);
			$results = tableSQL($sql);
			$cpt=compteSQL($sql);
										
			if ($cpt>0) {
				echo "<select size=\"1\" name=\"CHFID\" id=\"CHFID\">";	
				foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
					$CHFID = $ligne[0];
					$CHFNOM = $ligne[1];
					if ($CHFID==$CHFID_SAVE) {
						echo "<option value=$CHFID selected=\"selected\">$CHFNOM</option>";
					} else {
						echo "<option value=$CHFID>$CHFNOM</option>";
					}
				}
			} else {
				echo "<select size=\"1\" name=\"CHFID\" id=\"CHFID\" disabled=\"disabled\" >";	
				echo "<option>Aucune information...</option>";
			}
										
			echo "</select>";			   
    									
    		if (isset($_GET['message']))
    			echo $_GET['message'];
    		else
    			echo "&nbsp;";
    		?><br/>
			<label for="VEHIMMAT"></label>
			<br/>
			Véhicule
			<?php	
			$sql = "SELECT * FROM vehicule"; 
			$result = executeSQL($sql);
			$results = tableSQL($sql);
			$cpt=compteSQL($sql);
				
			if ($cpt>0) {
				echo "<select size=\"1\" name=\"VEHIMMAT\" id=\"VEHIMMAT\">";	
				foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
					$VEHIMMAT = $ligne[0];
					if ($VEHIMMAT==$VEHIMMAT_SAVE) {
						echo "<option value=$VEHIMMAT selected=\"selected\">$VEHIMMAT</option>";
					} else {
						echo "<option value=$VEHIMMAT>$VEHIMMAT</option>";
					}
				}						
			} else {
				echo "<select size=\"1\" name=\"VEHIMMAT\" id=\"VEHIMMAT\" disabled=\"disabled\" >";	
				echo "<option>Aucune information...</option>";
			}
			
			echo "</select>";			   
            
    		if (isset($_GET['message']))
    			echo $_GET['message'];
    		else
    			echo "&nbsp;";
    		?> 
			<br/>
			<label for="TRNARCHAUFFEUR"></label><br/>
			Pris en charge le <input type="text" name="TRNARCHAUFFEUR" id="TRNARCHAUFFEUR" class="calendrier" value="<?php echo $Date;?>" size="10" maxlength="10"/>
			<label for="Heures"></label>
			à <input type="text" name="Heures" id="Heures" size="5" maxlength="5" value="<?php echo $Heures;?>"/>
			<br/>
			<label for="TRNCOMMENTAIRE"></label><br/>
			Commentaire <br/><textarea id="TRNCOMMENTAIRE" name="TRNCOMMENTAIRE" rows="6" cols="25"></textarea>
			<br/>
			<p>
				<input id='tournee_valid' name='tournee_valid' type='submit' value='Valider'></input>
			</p>
		</form>
		<form id='tournee_annul' action ='tableau_de_donnees.php' method='get'>	
			<p>					
				<br/><input id='tournee_annul' name='tournee_annul' type='submit' value='Annuler'></input>
			</p>
		</form>
		<hr/>
			
		<strong>Etapes</strong><br/><br/>
		<?php	
		include 'ListeEtape.php';				
		?>
								
		<?php
		if (isset($_GET['message2']))
			echo $_GET['message2'];
		else
			echo "&nbsp;";
		?>
		<p><a href=noname></a></p>
		<?php
		echo "
			<a><strong>
				<input id='etape_ajout' type='button' name='etape_ajout' value='Ajouter...'  onclick='location.href=\"organiser_une_etape.php?id=$TRNNUM\"'/>
			</strong></a>";
		?>
		<hr />
	</body>
</html>