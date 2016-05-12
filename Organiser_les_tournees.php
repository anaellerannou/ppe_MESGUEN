<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include 'head.php';
		?>
	</head>
	
	<?php
		include 'connectAD.php';
	?>
	
	<body class="homepage">
			<!-- Header -->
					<!-- Inner -->
							<header>
								<h1><a id="logo">Application Chauffeur</a></h1>
								<hr/>
								<form id='formulairetest' action ='insertinfo.php' method='get'>	
								<label for="TRNDTE"></label><br/>
								Date <input type="text" name="TRNDTE" id="TRNDTE" class="calendrier" size="10" maxlength="10"/>
	
								<br/>
								<label for="CHFID"></label><br/>
								Chauffeur 
									<?php	
										$sql = "SELECT * FROM chauffeur ORDER BY CHFNOM"; 
										$result = executeSQL($sql);
								$cpt=compteSQL($sql);
										
										if ($cpt>0) {
											echo "<select size=\"1\" name=\"CHFID\" id=\"CHFID\">";	
											while ($row = $result->fetch_array(MYSQLI_BOTH)) {
											echo "<option value=$row[0]>$row[1]</option>";
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
								Véhicule
				   					<?php	
										$sql = "SELECT * FROM vehicule"; 
										$result = executeSQL($sql);
										$cpt=compteSQL($sql);
				
										if ($cpt>0) {
											echo "<select size=\"1\" name=\"VEHIMMAT\" id=\"VEHIMMAT\">";	
											while ($row = $result->fetch_array(MYSQLI_BOTH)) {
											echo "<option value=$row[0]>$row[0]</option>";
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
								à <input type="text" name="Heures" id="Heures" size="10" maxlength="5" value="00H00"/>
						
								<br/>
								<label for="TRNCOMMENTAIRE"></label><br/>
								Commentaire <textarea id="TRNCOMMENTAIRE" name="TRNCOMMENTAIRE" rows="6" cols="25"></textarea>
								<br/>
										<p>
									<input id='tournee_valid' name='tournee_valid' type='submit' value='Valider'></input>
								</form>
								<form id='tournee_annul' action ='test2.php' method='get'>	
									<br/><input id='tournee_annul' name='tournee_annul' type='submit' value='Annuler'></input>
								</form>
								<hr/>
								</p>
								<strong>Etapes</strong><br/><br/>
								<?php
									echo "<br/>";	
									include 'ListeEtape.php';				
								?>
								
								<?php
									if (isset($_GET['message2']))
										echo $_GET['message2'];
									else
										echo "&nbsp;";
								?>
								<p><a href=noname></a></p>
										<footer>
											<form id='etape_ajout' action ='' method='get'>	
												<a><strong>
												<button><img src="images/AjouterV2_3.png" title="Ajouter...">&nbsp; Ajouter</button>
												</strong></a>
											</form>
										</footer>
							</header>
			<!-- Footer -->
					<hr />
								<!-- Contact -->
									<section class="contact">
										<header>
											<h3>Contact</h3>
										</header>
										<a href="https://accounts.google.com/ServiceLogin?service=mail&passive=true&rm=false&continue=https://mail.google.com/mail/&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1#identifier" target="_blank" id="contact"><p>test@mail.com</p></a>
									</section>

	</body>
</html>
