<?php 
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>organiser une &eacute;tape</title>
			<link href="AC13.css" rel="stylesheet">
			<?php include '../head.php' ?>
			<link href="calendrier.css" rel="stylesheet">
			
			
		</head>

	<body>
				<p>Organiser les tourn&eacute;es - Tourn&eacute;e 
				<?php include '..\connectAD.php';
				//tournee arbitraire pour les tests
				$TRNNUM=$_SESSION['TRNNUM'];
				$_SESSION['TRNNUM']=$TRNNUM;
				$sql = 'SELECT `TRNNUM` FROM `tournee` WHERE `TRNNUM` ='.$TRNNUM.'; ';
				$result = champSQL($sql)  ;
				echo $result ;
				
				
				//$x=1;
				
				//$etpid=$result.$x;
				//$sql4 = "INSERT INTO `etape` (`TRNNUM`, `ETPID`) VALUES (`".$result."`, `".$etpid."`) "
				
				 ?> Etape <?php
				 $ETPID=$_GET['id'];
				 $sql2 = 'SELECT `ETPID` FROM `etape` WHERE `ETPID`='.$ETPID.';';
				 $result2 = champSQL ($sql2);
				 echo $result2 ; ?></p>
	
		<br/><br/>
		<form action ="modifier_etape.php" method="get" id="Formulaire">
			<fieldset>
		<div class='lieu'>
			<label for='lieu'>Lieu </label>
			
				<?php 
				$sql="SELECT ETPID,LIEUID,ETPHREDEBUT,ETPHREFIN FROM etape where TRNNUM=$TRNNUM AND ETPID=$ETPID;";
				$results = tableSQL($sql);
				
				echo "<table id=\"affichetableau\">";
				echo "<tbody>";
				
				foreach ($results as $ligne) {
					//on extrait chaque valeur de la ligne courante
					$ETPID = $ligne[0];
					$LIEUID = $ligne[1];
					$ETPHREDEBUT = $ligne[2];
					$ETPHREFIN = $ligne[3];
				
				}
				$LIEUID_SAVE=$LIEUID;
				$_SESSION['ETPID']=$ETPID;
				$ETPHREDEBUT=substr($ETPHREDEBUT,11,19);
				$ETPHREFIN=substr($ETPHREFIN,11,19);
				?>			
					
			
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
						if ($lieu==$LIEUID_SAVE) {
							echo "<option value=$lieu selected=\"selected\">$info</option>";
						} else {
							echo "<option value=$lieu>$info</option>";
						}
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
		<br/>
			<div id="date_prise_en_charge">
			<?php
				echo "
				<label for='date_prise_en_charge'>Pris en charge le</label>
				<input id='date_prise_en_charge' name='date_prise_en_charge' type='text' value='' class='calendrier' size='20'></input>
				<br/><br/>
				<label for='Heure'>à</label>
				<input type='text' name='Heure' id='Heure' size='10' maxlength='5' value='00H00'/>"
				?>
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tot">
				<?php
					echo "
					<label for='heure_rdv_tot'>Rendez-vous entre</label>
					<input id='heure_rdv_tot' name='heure_rdv_tot' type='text' size='20' maxlength='8' value='$ETPHREDEBUT'  />"
				?>																			
			
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
			
			</div>

			<br/>

			<div class="date_heure_rdv_tard">
			<?php
				echo "
				<label for='heure_rdv_tard'>et </label>
				<input id='heure_rdv_tard' name='heure_rdv_tard' type='text' size='20' maxlength='8' value='$ETPHREFIN'   /> "
			?>
			
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";   
    		?>
			
			</div>

			<br/>

			
	
			<div class="commentaire">
			<?php			
				echo "
				<label for='commentaire'>Commentaire</label>
				<textarea id='commentaire' name='commentaire' type='text' value=''></textarea> ";
			?>	
				
        	<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "&nbsp;";
    		?>
				
			</div>

			<br/><br/><br/><br/><br/>

	
			<input id="valider" name="valider" type="image" value="Valider" title="valider" src="../images/valider.png"></input>
			</fieldset>
		</form>
		<form action ="Modifier_les_tournees.php" method="get" id="Formulaire">
				<input id="annuler" name="annuler" type="image" value="Annuler" title="annuler" src="../images/deleteV2.png"></input>
		</form>
	</body>
</html>