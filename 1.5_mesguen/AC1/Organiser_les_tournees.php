<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include '../head.php';
			
		?>
		<link rel="stylesheet" href="AC12.css" />
	</head>
	
	<?php
		include '../connectAD.php';
		$sql = "SELECT TRNNUM FROM tournee";
		$result = executeSQL($sql);
		$results = tableSQL($sql);
		
		$i=0;
		foreach ($results as $ligne) {
			//on extrait chaque valeur de la ligne courante
			$TRNNUM = $ligne[0];
			$i++;
		}
		$i+=1;
		$TRNNUM=$i;
		$_SESSION['TRNNUM']=$TRNNUM;
	?>
	
	<body>
		<h1><a id="logo">Application Chauffeur</a></h1>
		
		<form id='formulairetest' action ='insertinfo.php?TRNNUM=$TRNNUM' method='get'>
			<label for='TRNDTE'></label><br/>
			Date <input type='text' name='TRNDTE' id='TRNDTE' class='calendrier' size='10' maxlength='10'/>
			<br/>
			<label for='CHFID'></label><br/>
			Chauffeur
			<?php	
			$sql = "SELECT * FROM chauffeur ORDER BY CHFNOM"; 
			$result = executeSQL($sql);
			$results = tableSQL($sql);
			$cpt=compteSQL($sql);
										
			if ($cpt>0) {
				echo "<select size=\"1\" name=\"CHFID\" id=\"CHFID\">";	
				foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
					$CHFID = $ligne[0];
					$CHFNOM = $ligne[1];
					echo "<option value=$CHFID>$CHFNOM</option>";	
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
					echo "<option value=$VEHIMMAT>$VEHIMMAT</option>";
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
			Pris en charge le <input type="text" name="TRNARCHAUFFEUR" id="TRNARCHAUFFEUR" class="calendrier" size="10" maxlength="10"/>
			<label for="Heures"></label>
			à <input type="text" name="Heures" id="Heures" size="2" maxlength="5" value="00H00"/>
			<br/>
			<label for="TRNCOMMENTAIRE"></label><br/>
			Commentaire <br/><textarea id="TRNCOMMENTAIRE" name="TRNCOMMENTAIRE" rows="6" cols="25"></textarea>
			<br/>
			<p>
				<?php
				echo "<input id='tournee_valid' name='tournee_valid' type='submit' value='Valider'></input>";
				?>
			</p>
		</form>
		<form id='tournee_annul' action ='tableau_de_donnees.php' method='get'>
			<p>
				<br/><input id='tournee_annul' name='tournee_annul' type='submit' value='Annuler'></input>
			</p>
		</form>
		
		
		
		 
		 <div class="etapes">
			
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
				<input id='etape_ajout' type='button' name='etape_ajout' value='Ajouter...' disabled='disabled' onclick='location.href=\"organiser_une_etape.php?id=$TRNNUM\"'/>
			</strong></a>";
		?>
		
		</div>
	</body>
</html>