<?php session_start(); 
require('essaiCAS.php');
?>
<!DOCTYPE html>
<html>



	<head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Demande de subvention pour publication</title>

        <link rel="stylesheet" href="formulaire.css">

        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<script src="formulaire.js"></script>

    </head>
  
   <body>
	
	<div class="bordereau">
		<img id="logo" src="logoparis13.png" alt="Logo iut" height="75" width="170" align="right"  >
		
		<ul id="menu">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="tableaudebord.php">Tableau de bord </a> </li>
         
              <li id="active2"><a href="#">Demande de subvention</a>
                <ul> 
                        <li id="active3"><a href="Demande.php"> Informations </a> </li>
                        <li id="active3"><a href="Demande_subvention1.php"> Demande pour actes de colloques</a></li>
                        <li id="active3"><a href="Demande_subvention2.php"> Demande de manifestation scientifique </a> </li>
                        
                </ul> </li>
                        <li><a href="https://www.univ-paris13.fr/bred/">En savoir plus</a></li>
			<li><a href="?logout=">Déconnexion</a></li>
			<?php 
				if (isset($_REQUEST['logout'])) {
 					phpCAS::logout();
				}	
			?>
		</ul>
		
      
		
	
		
			


		<hr width=400px align=left > 

		<p id="pgeX">Identifiant utilisateur : <?php echo phpCAS::getUser(); ?> </p>
		<hr width=400px align=left >
		
		
		
		
		<hr id = "grdebarre" width=1080px >
	</div> <!-- Fin div bordereau !-->
	
	
	<?php
		
			try
			{
				$bd = new PDO('mysql:host=localhost;dbname=subventions', 'adminsubventions', '2dlhtJW6-');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage()); 
			}
			
	   		$sql='select nom_publication from publication';
	   		echo '<br><br><br>';
			$req = $bd->prepare($sql);
			try	
			{
				$req->execute();
				echo "nom de la publication :".'<br/>';
				while($tab = $req->fetch(PDO::FETCH_ASSOC))
					echo $tab['nom_publication'].'<br/>';

			}
			catch(PDOException $e)
			{
				die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
			}
		
			/*$sql='select MAX(id_publication) from publication';
		
			$req = $bd->prepare($sql);
			try	
			{
				$req->execute();
				$tab = $req->fetch(PDO::FETCH_NUM);
				echo "n° de la demande: ".($tab[0]+1);
			}
			catch(PDOException $e)
			{
				die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
			}*/
		
		
		?>


<div id="ID1">
	
	
<?php
	if($_SESSION['valid1']==true)
		echo "Le formulaire e été rempli avec success";
	
	
	$_SESSION['valid1']=false;
	

?>

			<form action="validation_demande1.php" method="post">

				<h1>Formulaire de demande de subvention pour publication d’actes de colloque ou d’ouvrages thematiques collectifs</h1>

				

				<h4><strong>Remplir les informations obligatoire avec *</strong></h4>

				

				<fieldset>

					<legend><span class="number">1</span>Coordinateur Paris 13</legend>

						<div class="masquable ferme">

							<h2 class="masquable-titre"><span>+</span></h2>

							<div class="masquable-contenu">

								

								

								

									<p class="formulaire"><label> Prénom : </label>	<input type="text" name="prenom_co" id="prenom_co"/></p>

									

									<p class="formulaire"><label> Nom : </label>	<input type="text" name="nom_co" id="nom_co"/></p>

									

									<p class="formulaire"><label> Qualité : </label>	<input type="text" name="qualite_co" id="qualite_co"/></p>

									

									<p class="formulaire"><label> Composante : </label>	<input type="text" name="composante_co" id="composante_co"/></p>

									

									<p class="formulaire"><label> Laboratoire : </label>	<input type="text" name="laboratoire_co" id="laboratoire_co"/></p>

									<p class="formulaire"><label> Téléphone : </label>	<input type="text" placeholder="ex:0666666666" autofocus required pattern="(\d){10}" title="ex:0666666666" name="tel_co" id="tel"/></p>
									

									<p class="formulaire"><label> Type (actes, ouvrage) et nom de la publication : </label>	<input type="text" name="tel_co" id="Type"/></p>

								

							</div>

						</div>

				</fieldset>

					

					<h4><center> DEMANDE DE SUBVENTION POUR PUBLICATION </center></h4>

					

				<fieldset>

					<legend><span class="number">2</span>Demande présentée par : </legend>

					<!--------------------->

					<div class="masquable">

						<h2 class="masquable-titre"><span>-</span></h2>

						<div class="masquable-contenu">



							<p class="formulaire"><label> Prénom* : </label>	<input type="text" name="prenom" id="prenom"/></p>

							

							<p class="formulaire"><label> Nom* : </label>		<input type="text" name="nom" id="nom"/></p>

							

							<p class="formulaire"><label> Qualité* : </label>	<input type="text" name="qualite" id="qualite"/></p>

							

							<p class="formulaire"><label> Composante* : </label>	<input type="text" name="composante" id="composante"/></p>

							

							<p class="formulaire"><label> Laboratoire* : </label>	<input type="text" name="laboratoire" id="laboratoire"/></p>

							

							<p class="formulaire"><label> Téléphone* : </label>	<input type="text" placeholder="ex:0666666666" autofocus required pattern="(\d){10}" title="ex:0666666666" name="tel" id="tel"/></p>

							

							<p class="formulaire"><label> Mail* : </label>		<input type="text" name="mail" id="mail"/></p>

																

						</div>

					</div>

				</fieldset>



				<fieldset>

					<legend><span class="number">3</span>Description de la publication</legend>

					<div class="masquable">

						<h2 class="masquable-titre"><span>-</span></h2>

						<div class="masquable-contenu">



							<p class="formulaire"><label> Type (actes de colloque, ouvrage collectif…) : </label> <input type="text" name="type_publication" id="type2"/></p>	
	
							<p class="formulaire"><label> Nom de publication : </label> <input type="text" name="nom_publication" id="type2"/></p>

							<p class="formulaire"><label> Titre de l'ouvrage : </label> <input type="text" name="titre_ouvrage" id="type2"/></p>

							<p class="formulaire"><label> Date prévue : </label>	<input type="text" name="date"/></p>

							<p class="formulaire"><label> Editeur : </label>	<input type="text" name="editeur"/></p>
							

							<p class="formulaire"><label> Sous la direction de : </label>	<input type="text" name="direction" id="direction"/></p>

							

							<p class="formulaire"><label> Collaboration avec une autre université ou institution : </label> <input type="text" name="collaborateur" id="collaboration"/></p>

							

							<label> Nombre des contributions (attendues) : </label>

							

							<p class="formulaire"><label> dont Université Paris 13 : </label> <input type="text" name="ombre_contribuable_Paris13" id="nombre_contributionsp13"/></p>

							

							<p class="formulaire"><label> France : </label> <input type="text" name="ombre_contribuable_France" id="nombre_contributions_fr"/></p>

							

							<p class="formulaire"><label> Etranger : </label> <input type="text" name="nombre_contribuable_Etranger" id="nombre_contributions_etranger"/></p>

							

							<p class="formulaire"><label> Doctorants : </label> <input type="text" name="nombre_contribuable_Doctorants" id="nombre_contributions_doc"/></p>

							

							<p class="formulaire"><label> Mode de sélection des contributions  : </label> <input type="text" name="mode_selection_contribution" id="mode_de_contribution"/></p>

							

							<p><strong> Reconnaissance de l’éditeur dans la discipline : (Document à fournir signer par la discipline)</strong></p>

														

						</div>

					</div>

				</fieldset>

				

				<fieldset>

					<legend><span class="number">4</span>Financement</legend>

					<!--------------------->

					<div class="masquable ferme">

						<h2 class="masquable-titre"><span>+</span></h2>

						<div class="masquable-contenu">

							<p class="formulaire"><label>  Financement demandé (en €) : </label> <input type="text" name="montant"/></p>


							<p class="formulaire"><label>  Montant de la contribution financière demandée par l’éditeur : </label> <input type="text" name="montant_editeur" id=""/></p>

							

							<p class="formulaire"><label> Subvention demandée au CS : </label> <input type="text" name="subvention_demande_au_cs" id="subvention_demande_cs"/></p>

							

							<p class="formulaire"><label> Co-financement : </label> <input type="text" name="co_financement" id="Cofinancement"/></p>

																

						</div>

					</div>

				</fieldset>



				<fieldset>

					<legend><span class="number">5</span>Si la subvention est accordée par l’université souhaitez-vous : </legend>

					<div class="masquable ferme">

						<h2 class="masquable-titre"><span>+</span></h2>

						<div class="masquable-contenu">



							<p class="formulaire"><label> - un virement au laboratoire ? : </label> <input type="radio" class="radio" name="virement_laboratoire" value="oui"/> Oui <input type="radio" class="radio" name="virement_au_laboratoire" value="non"/> Non </p>

							

							<p class="formulaire"><label> - une gestion financière au BRED ? : </label> <input type="radio" class="radio" name="gestion_financiere_bred" value="oui"/> Oui <input type="radio" class="radio" name="gestion_financiere_bred" value="non"/> Non </p>

							

						</div>

					</div>

				</fieldset>

				

				<p> Dans les deux cas, 2 exemplaires de l’ouvrage devront être déposés au BRED à l’issue de la publication. Dans le premier cas, une photocopie des factures sera également exigée. </p>

				<p> Préciser de quel appui logistique vous disposez pour la publication et, en particulier, venant de votre laboratoire : </p>

				<textarea name="logistique" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>

				</br>

				<h4><center>ARGUMENTAIRE AU SOUTIEN DE LA DEMANDE DE SUBVENTION </center></h4>

				

				<p><strong> Pour les actes de colloque </strong>: argumentaire de deux ou trois pages développant notamment les thématiques du colloque et les approches privilégiées pour la publication en spécifiant la liste des contributeurs et les titres des articles. (3Mo Max conseillé en PDF)

					<input type="hidden" name="MAX_FILE_SIZE" value="3000000"><input type="file" name="argument_actes"/>

				</p>

				</br>

				<p><strong> Pour un ouvrage collectif </strong>: argumentaire de deux ou trois pages spécifiant les objectifs du projet, les méthodes et les approches privilégiées, la liste des auteurs ainsi que le titre et un bref résumé des propositions de contribution à la date de la demande. (3Mo Max conseillé en PDF)

					<input type="hidden" name="MAX_FILE_SIZE" value="3000000"><input type="file" name="argument_ouvrage"/>

				</p>

				

				<p> <input type="submit" name="envoyer" value="Enregistrer le dossier" /> </p>



			</form>

			

			<form>

				<div>	

						<p>Chargez le formulaire que vous aurez rempli :
							
							<input id="file" type="file" name="file" >
						</p>

				</div>


			</form>

			

			<form>

				<div>	<p> Une fois que vous aurez rempli votre formulaire, appuyez sur Envoyer pour envoyer le formulaire au BRED <br>

										<input id="boutton_envoyer" type="submit" value="Envoyer le formulaire" name="Envoyer" />

					</p>

				</div>				

			


			</form>		

			

		</div>

		

		

		

			<!---------------------------------------------------------------------------------------------------------------------------->

		

		
	
	<!-- Footer !-->
	<hr id = "grdebarre2" width=1020px  >
	
	<footer>
				<ul id="menu-footer">
					<a href="" title="Contact">Contact</a>
					<a href="" title="Mentions légales">Mentions légales</a>  
					<a href="?logout" title="Deconnexion">Déconnexion</a>
					<div id="liensfooter">	
						<a title="Facebook" href="https://www.facebook.com/pg/univparis13/about/?ref=page_internal"><img width="25%" src="facebook.png"/></a>
						<a title="Twitter" href="https://twitter.com/?lang=fr"><img width="25%" src="twitter.png"/></a>
						<a title="Youtube" href="https://www.youtube.com/?hl=fr&gl=FR"><img width="25%" src="youtube.png"/></a>
						<a title="Google" href="https://www.google.fr/"><img width="25%" src="google.png"/></a>
					</div>
				</ul>
				
	</footer>
		
	
	
	
   </body>


</html>
