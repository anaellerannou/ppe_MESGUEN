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
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>		
	</head>
	
	<?php
	
		
	
		include '../connectAD.php';
		if (empty($_GET['id'])) {
			$TRNNUM=$_SESSION['TRNNUM'];
			$_SESSION['TRNNUM']=$TRNNUM;
		} else {
			$TRNNUM=$_GET['id'];
			$_SESSION['TRNNUM']=$TRNNUM;
		}
		
		$sql="SELECT TRNNUM,VEHIMMAT,CHFID,TRNDTE FROM tournee where TRNNUM=$TRNNUM;";
		$results = tableSQL($sql);
		
		
			foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
				$TRNNUM = $ligne[0];
				$VEHIMMAT = $ligne[1];
				$CHFID = $ligne[2];
				$TRNDTE = $ligne[3];
			//	$tabDate = explode('-', $TRNDTE);
			//	$TRNDTE = $tabDate[2]."/".$tabDate[1]."/".$tabDate[0];
				
			}
			$VEHIMMAT_SAVE=$VEHIMMAT;
			$CHFID_SAVE=$CHFID;
			
			
		$sql="SELECT CHFID,CHFNOM FROM chauffeur where CHFID=$CHFID;";
		$results = tableSQL($sql);
			
		
			
			foreach ($results as $ligne) {
				//on extrait chaque valeur de la ligne courante
				$CHFID = $ligne[0];
				$CHFNOM = $ligne[1];
			
			}

			
			
			
			?>
	
	<body>
	
	
	
	
		<h1>Application Chauffeur</h1>
		<br/>
	
	<div class="container">	
	
		<div class="row">
		
		
			<div class="col-lg-6">
		
				<form class="form-horizontal" id='formulairetest' action ='UpdateInfo.php' method='get'>	
			
					<div class="row">
	      				<div class="col-lg-4"><label for="TRNDTE">Date</label></div>
			 			<div class="col-lg-8"><input type="text" name="TRNDTE" id="TRNDTE" class="calendrier" value="<?php echo $TRNDTE; ?>" size="10" maxlength="10"/></div>
						<br/><br/>
					</div>
					
					<div class="row">
	      				<div class="col-lg-4"><label for="CHFID">Chauffeur</label></div>
						<div class="col-lg-8">
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
    		?><br/><br/>
    		
    		</div></div>
    		
    		<div class="row">
	      		<div class="col-lg-4"><label for="VEHIMMAT">V&eacute;hicule</label></div>
			
				<div class="col-lg-8">
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
    		?></div>
    		<br/><br/>
    		</div>
    		
    		<div class="row">
	      		<div class="col-lg-4"><label for="TRNARCHAUFFEUR">Pris en charge le </label></div>
				<div class="col-lg-8"><input type="text" name="TRNARCHAUFFEUR" id="TRNARCHAUFFEUR" class="calendrier" size="10" maxlength="10"/></div>
			<br/><br/>
			</div>
			
			<div class="row">
	      		<div class="col-lg-4"><label for="Heures">à</label></div>
			 	<div class="col-lg-8"><input type="text" name="Heures" id="Heures" size="5" maxlength="5" value="00H00"/></div>
			<br/><br/>
			</div>
			
			
			<div class="row">
	      		<div class="col-lg-4"><label for="TRNCOMMENTAIRE">Commentaire</label></div>
				<div class="col-lg-8"><textarea id="TRNCOMMENTAIRE" name="TRNCOMMENTAIRE" rows="6" cols="25"></textarea></div>
			<br/><br/>
			</div>
			
			<div class="row">
			<div class="col-lg-offset-4 col-lg-8">
			<p>
				<br/><br/>
				<input class='btn btn-success' id='tournee_valid' name='tournee_valid' type='submit' value='Valider'></input>
			</p>
			</div>
			</div>
		</form>
		
		<div class="row">
		<div class="col-lg-offset-4 col-lg-8">
		<form id='tournee_annul' action ='tableau_de_donnees.php' method='get'>	
			<p>					
				<br/><input class='btn btn-warning' id='tournee_annul' name='tournee_annul' type='submit' value='Retour'></input>
			</p>
		</form>
		
		</div>
		</div>
		</div>
		
		
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
				<input class='form-horizontal btn btn-default' id='etape_ajout' type='button' name='etape_ajout' value='Ajouter...'  onclick='location.href=\"organiser_une_etape.php?id=$TRNNUM\"'/>
			</strong></a>";
		?>
		</div>
		
		</div>
		</div>
		
	</body>
</html>
