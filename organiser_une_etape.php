
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
		<form action ="valider_etape.php" method = "get"	id = "Formulaire">
			<fieldset>
				<p>Organiser les tourn&eacute;es - Tourn&eacute;e 
				<?php include 'connectAD.php';
				//tournee arbitraire pour les tests
				$trnnum= 1;
				$sql = 'SELECT `TRNNUM` FROM `tournee` WHERE `TRNNUM` ='.$trnnum.'; ';
				$result = champSQL($sql)  ;
				echo $result ;
				
				
				//$x=1;
				
				//$etpid=$result.$x;
				//$sql4 = "INSERT INTO `etape` (`TRNNUM`, `ETPID`) VALUES (`".$result."`, `".$etpid."`) "
				
				 ?> Etape <?php
				 $etpid= 1;
				 $sql2 = 'SELECT `ETPID` FROM `etape` WHERE `ETPID`='.$etpid.';';
				 $result2 = champSQL ($sql2);
				 echo $result2 ; ?></p>
	
		<br/><br/>
	
		<div class='lieu'>
			<label for='lieu'>Lieu </label>
			
					
			
				<select name='lieu' size=1 >
				
				<?php 
				
				$sql3 = 'SELECT `LIEUID` , `LIEUNOM` FROM `lieu` ';
				$cpt = compteSQL($sql3);
				$results = tableSQL($sql3);
				
				if ($cpt>0) {
					foreach ($results as $ligne) {
						//on extrait chaque valeur de la ligne courante, 
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
		
			<div id="date_prise_en_charge">
				<label for="date_prise_en_charge">Pris en charge le</label>
				<input id="date_prise_en_charge" name="date_prise_en_charge" type="date" value="08-07-15" class="calendrier" size="20"></input>
			
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tot">
				<label for="date_heure_rdv_tot">Rendez-vous entre</label>
				<input id="date_heure_rdv_tot" name="heure_rdv_tot" type="text" size="20" value="00:00:00"  />
																							
			
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tard">
				<label for="date_heure_rdv_tard">et </label>
				<input id="date_heure_rdv_tard" name="heure_rdv_tard" type="text" size="20" value="00:00:00"   />
			
			
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

	
			<a href=""><input id="valider" name="submit" type="image" value="Valider" title="valider" src="valider.png"/></a>
		&nbsp;
			<input id="annuler" name="reset" type="image" value="Annuler" title="annuler" src="lannuler-supprimer-icone-8790-128.png"/>
	
	
			</fieldset>
		</form>
	</body>
</html>