<?php session_start(); 
require('essaiCAS.php');
?>﻿
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
                        <li><a href="Demande.php"> Informations </a> </li>
                        <li><a href="Demande_subvention1.php"> Demande pour actes de colloques</a></li>
                        <li><a href="Demande_subvention2.php"> Demande de manifestation scientifique </a> </li>
                        
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

		
		
		<hr id = "grdebarre" width=1080px ></br>
		
	</div> <!-- Fin div bordereau !-->
	
	<?php
	
		if(@$_SESSION['valid2']==true)
			echo "Le formulaire e été rempli avec success";
		
		
		$_SESSION['valid2']=false;
	
	?>



<div id="ID2">
			<form action="validation_demande2.php" method="post">
				<h1>Formulaire de demande de subvention pour une manifestation scientifique</h1>
				
				<h4><strong>Remplir les informations obligatoire avec *</strong></h4>
				
				<fieldset>
					<legend><span class="numbere">1</span>Organisateur(s) Paris 13</legend>
						<div class="masquable">
							<h2 class="masquable-titre"><span>-</span></h2>
							<div class="masquable-contenu">
																
									<p class="formulaire"><label> Prénom : </label>	<input type="text" name="prenom_org" id="prenom_org"/></p>
									
									<p class="formulaire"><label> Nom : </label>	<input type="text" name="nom_org" id="nom_org"/></p>
									
									<p class="formulaire"><label> Qualité : </label>	<input type="text" name="qualite_org" id="qualite_org"/></p>
									
									<p class="formulaire"><label> Composante : </label>	<input type="text" name="composante_org" id="composante_org"/></p>
									
									<p class="formulaire"><label> Laboratoire : </label>	<input type="text" name="laboratoire_org" id="laboratoire_org"/></p>
									
									<p class="formulaire"><label> Type (congrès, colloque..) et nom de la manifestation : </label>	<input type="text" name="tel_org" id="tel_org"/></p>
									
									<p class="formulaire"><label> Date(s) et lieu : </label>	<input type="text" name="date_prevue" id="date_prevu"/></p>
									
									<p class="formulaire"><label> Financement demandé (en €) : </label>	<input type="text" name="financement" id="financement"/></p>
								
							</div>
						</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">2</span>Si la subvention est accordée par l’université souhaitez-vous : </legend>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> - un virement au laboratoire ? : </label> <input type="radio" class="radio" name="virement_au_laboratoire" value="oui"/> Oui <input type="radio" class="radio" name="virement_au_laboratoire" value="non"/> Non </p>
							
							<p class="formulaire"><label> - une gestion financière au BRED ? : </label> <input type="radio" class="radio" name="gestion_financiere_bred" value="oui"/> Oui <input type="radio" class="radio" name="gestion_financiere_bred" value="non"/> Non </p>
							
							<p class="formulaire"><label> Caractère : </label>
														<input type="radio" name="caractere" value="national"/> national 
														<input type="radio" name="caractere" value="européen"/> européen 
														<input type="radio" name="caractere" value="international"/> international
							</p>
							
							<p class="formulaire"><label> Site web éventuel : </label> <input type="text" name="site" id="site"/></p>

						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">3</span>Lieu de la manifestation :</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
							
							<p class="formulaire"><label> Université Paris 13 (à préciser) : </label> <input type="text" name="lieu" id="lieu"/></p>
							
							<p class="formulaire"><label> Autre (préciser) : </label> <input type="text" name="lieu" id="lieu"/></p>

						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend><span class="numbere">4</span>Organisateur principal :</legend>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
						
							<p class="formulaire"><label> Responsable de l'organisation : </label> <input type="text" name="responsable" id="responsable"/></p>
							
							<p class="formulaire"><label> Adresse : </label> <input type="text" name="adresse" id="adresse"/></p>
							
							<p class="formulaire"><label> Téléphone : </label> <input type="text" name="tel" id="tel"/></p>
							
							<p class="formulaire"><label> Mail : </label> <input type="text" name="mail" id="mail"/></p>
							
						</div>
					</div>
				</fieldset>

				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">5</span>Co-organisateurs : </legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Responsables : </label> <input type="text" name="responsable_co_org" id="responsable_co_org"/></p>
							
							<p class="formulaire"><label> Adresses : </label> <input type="text" name="adresse_co_org" id="adresse_co_org"/></p>
							
							<p class="formulaire"><label> Téléphones : </label> <input type="text" name="tel_co_org" id="tel_co_org"/></p>
							
							<p class="formulaire"><label> Mails : </label> <input type="text" name="mail_co_org" id="mail_co_org"/></p>
																
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend><span class="numbere">6</span>Participants</legend>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Nombre total de participants attendus : </label>	<input type="text" name="nb_total_participant" id="nb_total_participant"/></p>
						
							<p class="formulaire"><label> Dont payants : </label> <input type="text" name="participants_payants" id="participants_payants"/></p>
							
							<p class="formulaire"><label> Dont non-payants : </label> <input type="text" name="participants_non_payants" id="participants_non_payants"/></p>
							
							<p class="formulaire"><label> Dont étudiants : </label> <input type="text" name="participants_etudiants" id="participants_etudiants"/></p>
							
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">7</span>Conférenciers</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Nombre total de conférenciers prévus : </label>	<input type="text" name="nb_total_conferenciers" id="nb_total_conferenciers"/></p>
							
							<p class="formulaire"><label> Dont Université Paris 13 : </label> <input type="text" name="conferenciers_paris13" id="conferenciers_paris13"/></p>
							
							<p class="formulaire"><label> Dont France : </label> <input type="text" name="conferenciers_etrangers" id="conferenciers_etrangers"/></p>
							
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend><span class="numbere">8</span>Droits d'incription</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Participant plein tarif : </label>	<input type="text" name="participants_plein_tarif" id="participants_plein_tarif"/></p>
							
							<p class="formulaire"><label> Participant étudiant : </label> <input type="text" name="participants_tarif_etudiant" id="participants_tarif_etudiant"/></p>
							
						</div>
					</div>
				</fieldset>
								
				<fieldset>
					<legend><span class="numbere">9</span>Conditions</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
							<p><strong> Conditions d’invitation des conférenciers : </strong></p>
							<p>Préciser les défraiements accordés aux conférenciers invités (voyage, logement…)</p>
							<textarea name="defraimements" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>
							
							<p><strong>Conditions de subvention de participants étudiants :</strong></p>
							<p>Préciser s’il est prévu des subventions spécifiques pour la participation des étudiants.</p>
							<textarea name="subventions_etudiants" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>
							
							<p><strong>Conditions d’organisation :</strong></p>
							<p>Préciser de quel appui logistique éventuel vous disposez pour l’organisation et en particulier pour le laboratoire.</p>
							<textarea name="logistique" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>

							</br>
						</div>
					</div>
				</fieldset>
			</form>
			
			<form>
				<div>
					<h2>Projet scientifique</h2>
					<p>Description du projet scientifique : exposé de la thématique, du public visé, des raisons opportunes de l’organisation de cette manifestation, des liens avec des collaborations nationales ou internationales....). Deux pages maximum.(3Mo Max conseillé en PDF)
						<input id="file" type="file" name="file" ></input>
					</p>
				</div>
			</form>
			
			<form>
				<div>
					<h2>Financement prévisionnel en € TTC</h2>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
						
							<p><strong>Sources de financement (Préciser si les crédits sont acquis ou demandés)</strong></p>
							
							<p><label><strong>Droits d’inscription des participants : </strong></label>
							
							<p class="formulaire"><label> - établissements publics : </label> <input type="text" name="etablissements_publics" id="etablissements_publics"/></p>

							<p class="formulaire"><label> - étudiants : </label> <input type="text" name="etudiants" id="etudiants"/></p>

							<p class="formulaire"><label> - établissements privés : </label> <input type="text" name="etablissements_prives" id="etablissements_prives"/></p>
						
							<p class="formulaire"><label> - crédits du laboratoire : </label> <input type="text" name="credits_laboratoire" id="credits_laboratoire"/></p>

							<p><strong> Subventions sollicitées : </strong></p>

							<p class="formulaire"><label> - Ministère Enseignement Supérieur et Recherche :</label> <input type="text" name="ministere_esr" id="ministere_esr"/></p>

							<p class="formulaire"><label> - Ministère Affaires Etrangères : </label> <input type="text" name="ministere_ae" id="ministere_ae"/></p>

							<p class="formulaire"><label> - Autres Ministères: </label><input type="text" name="autres_ministeres" id="autres_ministeres"/></p>

							<p class="formulaire"><label> - Union Européenne: </label> <input type="text" name="union_europeenne" id="union_europeenne"/></p>

							<p class="formulaire"><label> - Municipalité :</label> <input type="text" name="municipalite" id="municipalite"/></p>

							<p class="formulaire"><label> - Conseil Régional : </label> <input type="text" name="conseil_regional" id="conseil_regional"/></p>
						
							<p class="formulaire"><label> - Conseil Général : </label> <input type="text" name="conseil_general" id="conseil_general"/></p>	
							
							<p class="formulaire"><label> - C.N.R.S. : </label> <input type="text" name="cnrs" id="cnrs"/></p>

							<p class="formulaire"><label> - INSERM :</label> <input type="text" name="inserm" id="inserm"/></p>

							<p class="formulaire"><label> - Autres EPST ou EPIC : </label> <input type="text" name="epst_epic" id="epst_epic"/></p>
						
							<p class="formulaire"><label> - Organismes privés (fondations, associations…préciser) : </label> <input type="text" name="org_prives" id="org_prives"/></p>	

							<p class="formulaire"><label> - Autres organismes (préciser): </label> <input type="text" name="autres_org" id="autres_org"/></p>

							<p class="formulaire"><label> - Subvention demandée à l’Université Paris 13 :  </label> <input type="text" name="subventions_p13" id="subventions_p13"/></p>
												
						</div>
					</div>
					</br>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
						
							<p><strong>Dépenses prévues</strong></p>
														
							<p class="formulaire"><label> Publicité, courrier, téléphone : </label> <input type="text" name="pub_courrier_tel" id="pub_courrier_tel"/></p>
							
							<p class="formulaire"><label> Fournitures (bloc-notes, badges..) : </label> <input type="text" name="fournitures" id="fournitures"/></p>

							<p class="formulaire"><label> Location de salles de conférences : </label> <input type="text" name="location" id="location"/></p>
						
							<p class="formulaire"><label> Repas, cocktail : </label> <input type="text" name="repas" id="repas"/></p>

							<p class="formulaire"><label> Secrétariat (salaires, vacations..) : </label> <input type="text" name="secretariat" id="secretariat"/></p>

							<p class="formulaire"><label> Frais de séjour (hôtel..) : </label> <input type="text" name="frais_sejour" id="frais_sejour"/></p>

							<p class="formulaire"><label> Frais de transports : </label><input type="text" name="frais_transport" id="frais_transport"/></p>

							<p class="formulaire"><label> Subventions de participation : </label> <input type="text" name="subventions_participation" id="subventions_participation"/></p>

							<p class="formulaire"><label> Indemnités conférenciers : </label> <input type="text" name="indemnites_conferenciers" id="indemnites_conferenciers"/></p>

							<p class="formulaire"><label> Montage de stands : </label> <input type="text" name="montage_stand" id="montage_stand"/></p>
						
							<p class="formulaire"><label> Gestion de dossiers : </label> <input type="text" name="gestion_dossier" id="gestion_dossier"/></p>	
							
							<p class="formulaire"><label> Traduction simultanée : </label> <input type="text" name="traduction" id="traduction"/></p>

							<p class="formulaire"><label> Autres frais (préciser) : </label> <input type="text" name="autres_frais" id="autres_frais"/></p>

							<p class="formulaire"><label> <strong>TOTAL DEPENSES :</strong> </label> <input type="text" name="total_depenses" id="total_depenses"/></p>
						
						</div>
					</div>
				</div>	
					<p> <input type="submit" name="envoyer" value="Enregistrer le dossier" /> </p>

			</form>		
			
		</div>
		
			
			
			<form>
				<div>	
						<p>Chargez le formulaire que vous aurez rempli :
										<input id="file" type="file" name="file" ></input>
						</p>
				</div>
			</form>
			
			<form>
				<div>	<p> Une fois que vous aurez rempli votre formulaire, appuyez sur Envoyer pour envoyer le formulaire au BRED <br>
										<input id="boutton_envoyer" type="submit" value="Envoyer le formulaire" title="Envoyer votre formulaire rempli au BRED" ></input>
						</p>
				</div>				
			</form>		
			
		</div>
		
		
		
			




	
	
	
	
	
	
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
