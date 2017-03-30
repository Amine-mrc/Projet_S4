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
         
              <li id="active"><a href="#">Demande de subvention</a>
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
        
		
		
		
		
			


		
			<hr width=150px align=left > 

		<p id="pgeX">Identifiant utilisateur : <?php echo phpCAS::getUser(); ?> </p>

				<hr width=150px align=left > 

		
		
		<hr id = "grdebarre" width=1080px ></br>
		
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





	if(!(isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["qualite"]) and isset($_POST["composante"]) and isset($_POST["laboratoire"]) and isset($_POST["tel"]) and isset($_POST["mail"]) ))
		echo " ";
	else {
		$rep="./subvention/".strtoupper($_POST["nom"]).$_POST["prenom"];
		
		
				
				//////////////////////////////////////////////////////////////////insertion table client
				
				$sql = 'INSERT INTO client (nom,prenom,qualite,composante,laboratoire,tel,mail) VALUES (:nom, :prenom ,:qualite ,:composante ,:laboratoire ,:tel ,:mail)';

				try	
						{
						$req = $bd->prepare($sql);
						$req->bindValue(':nom'	,htmlspecialchars($_POST['nom']));
						$req->bindValue(':prenom'	,htmlspecialchars($_POST['prenom']));					
						$req->bindValue(':qualite'	,htmlspecialchars($_POST['qualite']));
						$req->bindValue(':composante'	,htmlspecialchars($_POST['composante']));
						$req->bindValue(':laboratoire'	,htmlspecialchars($_POST['laboratoire']));
						$req->bindValue(':tel'		,htmlspecialchars($_POST['tel']));
						$req->bindValue(':mail'	,htmlspecialchars($_POST['mail']));
						$req->execute();
					}
				catch(PDOException $e)
				{
				die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				
				$sql='select MAX(id_client) from client';
				$req = $bd->prepare($sql);
				try	
				{
					$req->execute();
					$tab = $req->fetch(PDO::FETCH_NUM);
					$_SESSION['id_client'] = (int)$tab[0];
				}
				catch(PDOException $e)
					{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
					}
					
				
				
				
					
				////////////////////////////////////////////////////////////////////////////////////insertion table manifestation

				
				$sql = 'INSERT INTO manifestation (nom_manif,date_manif,lieu,caractere,site_web,id_client) values (:nom_manif,:date_manif,:lieu,:caractere,:site_web,:id_client)';

				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':nom_manif'	,htmlspecialchars($_POST['nom_manif']));
						$req->bindValue(':date_manif'	,htmlspecialchars($_POST['date_manif']));
						$req->bindValue(':lieu'	,htmlspecialchars($_POST['lieu']));
						$req->bindValue(':caractere'	,htmlspecialchars($_POST['caractere']));
						$req->bindValue(':site_web'		,htmlspecialchars($_POST['site_web']));
						$req->bindValue(':id_client'	,htmlspecialchars($_SESSION['id_client']));
						$req->execute();
					}
				catch(PDOException $e)
				{
				die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				$sql='select MAX(id_manif) from manifestation';
				$req = $bd->prepare($sql);
				try	
				{
					$req->execute();
					$tab = $req->fetch(PDO::FETCH_NUM);
					$_SESSION['id_manif'] = (int)$tab[0];
				}
				catch(PDOException $e)
					{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
					}	
				
				
				//////////////////////////////////////////////////////////////////insertion table financement
				
				
				$sql = 'INSERT INTO financement (montant,virement_laboratoire,gestion_financiere_bred,id_manif) VALUES (:montant, :virement_laboratoire, :gestion_financiere_bred, :id_manif)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':montant'	,htmlspecialchars($_POST['montant']));			
						$req->bindValue(':virement_laboratoire'		,htmlspecialchars($_POST['virement_laboratoire']));
						$req->bindValue(':gestion_financiere_bred'	,htmlspecialchars($_POST['gestion_financiere_bred']));
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);		
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
										
				
				//////////////////////////////////////////////////////////////////insertion table organisateur
				
				
				$sql = 'INSERT INTO organisateur (id_manif,responsables,addresse,tel,mail,co_responsable,addresse_co_responsable,tel_co_responsable,mail_co_responsable,conditions_organisation) VALUES (:id_manif, :responsables, :addresse, :tel, :mail, :co_responsable, :addresse_co_responsable, :tel_co_responsable, :mail_co_responsable, :conditions_organisation)';
				
				try				
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':responsables'	,htmlspecialchars($_POST['responsables']));			
						$req->bindValue(':addresse'		,htmlspecialchars($_POST['addresse_orga']));
						$req->bindValue(':tel'	,htmlspecialchars($_POST['tel_orga']));
						$req->bindValue(':mail'		,htmlspecialchars($_POST['mail_orga']));
						$req->bindValue(':co_responsable'	,htmlspecialchars($_POST['co_responsable']));			
						$req->bindValue(':addresse_co_responsable'		,htmlspecialchars($_POST['addresse_co_responsable']));
						$req->bindValue(':tel_co_responsable'	,htmlspecialchars($_POST['tel_co_responsable']));
						$req->bindValue(':mail_co_responsable'	,htmlspecialchars($_POST['mail_co_responsable']));			
						$req->bindValue(':conditions_organisation'		,htmlspecialchars($_POST['conditions_organisation']));
								
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				
				//////////////////////////////////////////////////////////////////insertion table participants
				
				
				$sql = 'INSERT INTO participants (id_manif,nb_participants,dont_payants,dont_non_payants,dont_etudiants,conditions_subvention_participants_etudiants) VALUES (:id_manif, :nb_participant, :dont_payants, :dont_non_payants, :dont_etudiants, :conditions_subvention_participants_etudiants)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':nb_participant'	,htmlspecialchars($_POST['nb_participant']));			
						$req->bindValue(':dont_payants'		,htmlspecialchars($_POST['dont_payants']));
						$req->bindValue(':dont_non_payants'	,htmlspecialchars($_POST['dont_non_payants']));
						$req->bindValue(':dont_etudiants'		,htmlspecialchars($_POST['dont_etudiants']));
						$req->bindValue(':conditions_subvention_participants_etudiants'	,htmlspecialchars($_POST['conditions_subvention_participants_etudiants']));			
								
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				
				//////////////////////////////////////////////////////////////////insertion table conferenciers
				
				
				$sql = 'INSERT INTO conferenciers (id_manif,nb_conferenciers,dont_Paris13,dont_France,dont_etrangers,conditions_invitation) VALUES (:id_manif, :nb_conferenciers, :dont_Paris13, :dont_France, :dont_etranger, :conditions_invitation)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':nb_conferenciers'	,htmlspecialchars($_POST['nb_conferenciers']));			
						$req->bindValue(':dont_Paris13'		,htmlspecialchars($_POST['dont_Paris13']));
						$req->bindValue(':dont_France'	,htmlspecialchars($_POST['dont_France']));
						$req->bindValue(':dont_etranger'		,htmlspecialchars($_POST['dont_Etranger']));
						$req->bindValue(':conditions_invitation'	,htmlspecialchars($_POST['conditions_invitation']));			
								
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
					
				
				//////////////////////////////////////////////////////////////////insertion table Montant_droit_inscription_participants
				
				
				$sql = 'INSERT INTO Montant_droit_inscription_participants (id_manif,etablissement_publics,etudiants,etablissement_prives,plein_tarif) VALUES (:id_manif, :etablissement_publics, :etudiants, :etablissement_prives, :plein_tarif)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':etablissement_publics'	,htmlspecialchars($_POST['etablissement_publics']));			
						$req->bindValue(':etudiants'	,htmlspecialchars($_POST['etudiants']));
						$req->bindValue(':etablissement_prives'		,htmlspecialchars($_POST['etablissement_prives']));
						$req->bindValue(':plein_tarif'		,htmlspecialchars($_POST['plein_tarif']));								
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				
				//////////////////////////////////////////////////////////////////insertion table montant_subvention_sollicitees
				
				
				$sql = 'INSERT INTO montant_subvention_sollicitees VALUES (:id_manif, :ministere_enseignement_sup_recherche, :ministere_affaires_etrangeres, :autres_ministeres, :union_europeenne, :municipalite, :conseil_regional, :conseil_general, :CNRS, :INSERM, :autres_EPST_ou_EPIC, :organismes_prives, :autres_organismes, :subvention_demande_a_Univ_Paris13)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':ministere_enseignement_sup_recherche'	,htmlspecialchars($_POST['ministere_enseignement_sup_recherche']));			
						$req->bindValue(':ministere_affaires_etrangeres'	,htmlspecialchars($_POST['ministere_affaires_etrangeres']));
						$req->bindValue(':autres_ministeres'		,htmlspecialchars($_POST['autres_ministeres']));
						$req->bindValue(':union_europeenne'		,htmlspecialchars($_POST['union_europeenne']));	
						$req->bindValue(':municipalite'	,htmlspecialchars($_POST['municipalite']));
						$req->bindValue(':conseil_regional'	,htmlspecialchars($_POST['conseil_regional']));			
						$req->bindValue(':conseil_general'	,htmlspecialchars($_POST['conseil_general']));
						$req->bindValue(':CNRS'		,htmlspecialchars($_POST['CNRS']));
						$req->bindValue(':INSERM'		,htmlspecialchars($_POST['INSERM']));
						$req->bindValue(':autres_EPST_ou_EPIC'	,htmlspecialchars($_POST['autres_EPST_ou_EPIC']));
						$req->bindValue(':organismes_prives'	,htmlspecialchars($_POST['organismes_prives']));			
						$req->bindValue(':autres_organismes'	,htmlspecialchars($_POST['autres_organismes']));
						$req->bindValue(':subvention_demande_a_Univ_Paris13'		,htmlspecialchars($_POST['subvention_demande_a_Univ_Paris13']));
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				
				//////////////////////////////////////////////////////////////////insertion table depenses_prevues
				
				
				$sql = 'INSERT INTO depenses_prevues VALUES (:id_manif, :publicite_courrier_tel, :fournitures, :location_salle_conference, :repas, :salaire_secretariat, :frais_de_sejour, :frais_de_transport, :subvention_participation, :indemnites_conferenciers, :montage_stands, :gestion_dossiers, :traduction_simultanee, :autres, :total)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':id_manif'	,$_SESSION['id_manif']);
						$req->bindValue(':publicite_courrier_tel'	,htmlspecialchars($_POST['publicite_courrier_tel']));			
						$req->bindValue(':fournitures'	,htmlspecialchars($_POST['fournitures']));
						$req->bindValue(':location_salle_conference'		,htmlspecialchars($_POST['location_salle_conference']));
						$req->bindValue(':repas'		,htmlspecialchars($_POST['repas']));	
						$req->bindValue(':salaire_secretariat'	,htmlspecialchars($_POST['salaire_secretariat']));
						$req->bindValue(':frais_de_sejour'	,htmlspecialchars($_POST['frais_de_sejour']));			
						$req->bindValue(':frais_de_transport'	,htmlspecialchars($_POST['frais_de_transport']));
						$req->bindValue(':subvention_participation'		,htmlspecialchars($_POST['subvention_participation']));
						$req->bindValue(':indemnites_conferenciers'		,htmlspecialchars($_POST['indemnites_conferenciers']));
						$req->bindValue(':montage_stands'	,htmlspecialchars($_POST['montage_stands']));
						$req->bindValue(':gestion_dossiers'	,htmlspecialchars($_POST['gestion_dossiers']));			
						$req->bindValue(':traduction_simultanee'	,htmlspecialchars($_POST['traduction_simultanee']));
						$req->bindValue(':autres'		,htmlspecialchars($_POST['autres']));
						$req->bindValue(':total'		,htmlspecialchars($_POST['total']));
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
					
		
		$fichier ='./'.strtoupper($_POST["nom"]).$_POST["prenom"].'.txt';
		$file = fopen($fichier, 'w') or die('Ne peut pas ouvrir le fichier : '.$fichier);;	
			
		fseek($file,0);
		foreach($_POST as $val => $c )
		{
			fputs($file,$val." : ".$c);
			fputs($file,"\n");
			
		}
		echo "<center><strong>Enregistrée!</strong></center>";
		fclose($file);

		try
			{
				$DateOfRequest = date("Y-m-d H:i:s"); 
				$req = $bd->prepare('INSERT INTO subvention_actes (demandeur_nom,demandeur_prenom,date) VALUES (:nom, :prenom, :date)');
				$req->bindValue(':nom',htmlspecialchars($_POST['nom']));
				$req->bindValue(':prenom',htmlspecialchars($_POST['prenom']));
				$req->bindValue(':date',$DateOfRequest);
				$req->execute();
					/*CREATE TABLE T_CLIENT_CLI 
					(CLI_ID            INT NOT NULL IDENTITY(12485, 1) PRIMARY KEY, 
					 CLI_NOM           CHAR(32) NOT NULL, 
					 CLI_PRENOM        VARCHAR(25))*/

	
			}
		catch(PDOException $e)
		{
			die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
		}
	

		if(isset($_FILES['argumentaire_actes']))
		{ 

			
    			if($_FILES['argumentaire_actes']['size'] >$maxsize) $erreur = "Erreur le fichier est trop gros";
    			//$extension_upload = strtolower(  substr(  strrchr($_FILES['argumentaire_actes']['name'], '.')  ,1)  );
			
			//$type_file = $_FILES['argumentaire_actes']['type'];
		
			$dossier = '.';
    			$fichier = basename($_FILES['argumentaire_actes']['name']);

     				if(move_uploaded_file($_FILES['argumentaire_actes']['tmp_name'], $dossier . $fichier)) 
  					  {
  						     echo 'Upload du fichier d\'argument effectué avec succès !';
  					  }
  				else
  				   {
  				        echo 'Echec de l\'upload du fichier d\'argument !';
  				   }
		}
		
		
			if(isset($_FILES['argumentaire_ouvrage']))
			{ 
				if($_FILES['argumentaire_ouvrage']['size'] >$maxsize) echo "Erreur le fichier est trop gros";
    			 	//$extension_upload = strtolower(  substr(  strrchr($_FILES['argumentaire_ouvrage']['name'], '.')  ,1)  );
				$dossier = '.';
    				$fichier = basename($_FILES['argumentaire_ouvrage']['name']);
     					if(move_uploaded_file($_FILES['argumentaire_ouvrage']['tmp_name'], $dossier . $fichier)) 
  					  {
  						     echo 'Upload du fichier d\'argument effectué avec succès !';
  					  }
  					else
  					   {
  					        echo 'Echec de l\'upload du fichier d\'argument !';
  					   }
			}
		}



	

?>


<div id="ID2">
			<form action="Demande_subvention2.php" method="post">
				<h1>Formulaire de demande de subvention pour une manifestation scientifique</h1>
				
				<h4><strong>Remplir les informations obligatoire avec *</strong></h4>
				
				<fieldset>
					<legend><span class="numbere">1</span>Organisateur(s) Paris 13</legend>
						<div class="masquable">
							<h2 class="masquable-titre"><span>-</span></h2>
							<div class="masquable-contenu">
																
									<p class="formulaire"><label> Prénom : </label>	<input type="text" name="prenom" id="prenom_org"/></p>
									
									<p class="formulaire"><label> Nom : </label>	<input type="text" name="nom" id="nom_org"/></p>
									
									<p class="formulaire"><label> Qualité : </label>	<input type="text" name="qualite" id="qualite_org"/></p>
									
									<p class="formulaire"><label> Composante : </label>	<input type="text" name="composante" id="composante_org"/></p>
									
									<p class="formulaire"><label> Laboratoire : </label>	<input type="text" name="laboratoire" id="laboratoire_org"/></p>
									
									<p class="formulaire"><label> Telephone : </label>	<input type="text" name="tel" id="composante_org"/></p>
									
									<p class="formulaire"><label> Mail : </label>	<input type="text" name="mail" id="laboratoire_org"/></p>
									
																										
							</div>
						</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">2</span>Si la subvention est accordée par l’université souhaitez-vous : </legend>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
	
							<p class="formulaire"><label> Financement demandé (en €) : </label>	<input type="text" name="montant" id="financement"/></p>
							
							<p class="formulaire"><label> - un virement au laboratoire ? : </label> <input type="radio" class="radio" name="virement_laboratoire" value="oui"/> Oui <input type="radio" class="radio" name="virement_laboratoire" value="non"/> Non </p>
							
							<p class="formulaire"><label> - une gestion financière au BRED ? : </label> <input type="radio" class="radio" name="gestion_financiere_bred" value="oui"/> Oui <input type="radio" class="radio" name="gestion_financiere_bred" value="non"/> Non </p>
							
							
							

						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">3</span>Description de la manifestation :</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
							
							<p class="formulaire"><label> Nom de la manifestation : </label> <input type="text" name="nom_manif" id="lieu"/></p>
							
							<p class="formulaire"><label> Date : </label> <input type="text" name="date_manif" id="lieu"/></p>
							
							<p class="formulaire"><label> Caractère : </label>
														<input type="radio" name="caractere" value="national"/> national 
														<input type="radio" name="caractere" value="européen"/> européen 
														<input type="radio" name="caractere" value="international"/> international
							</p>

							<p class="formulaire"><label> Site web éventuel : </label> <input type="text" name="site_web" id="site"/></p>

						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">3</span>Lieu de la manifestation (1 choix possible) :</legend>
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
						
							<p class="formulaire"><label> Responsable de l'organisation : </label> <input type="text" name="responsables" id="responsable"/></p>
							
							<p class="formulaire"><label> Adresse : </label> <input type="text" name="addresse_orga" id="adresse"/></p>
							
							<p class="formulaire"><label> Téléphone : </label> <input type="text" name="tel_orga" id="tel"/></p>
							
							<p class="formulaire"><label> Mail : </label> <input type="text" name="mail_orga" id="mail"/></p>
							
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

							<p class="formulaire"><label> Responsable : </label> <input type="text" name="co_responsable" id="responsable_co_org"/></p>
							
							<p class="formulaire"><label> Adresse : </label> <input type="text" name="addresse_co_responsable" id="adresse_co_org"/></p>
							
							<p class="formulaire"><label> Téléphone : </label> <input type="text" name="tel_co_responsable" id="tel_co_org"/></p>
							
							<p class="formulaire"><label> Mail : </label> <input type="text" name="mail_co_responsable" id="mail_co_org"/></p>
																
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend><span class="numbere">6</span>Participants</legend>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Nombre total de participants attendus : </label>	<input type="text" name="nb_participant" id="nb_total_participant"/></p>
						
							<p class="formulaire"><label> Dont payants : </label> <input type="text" name="dont_payants" id="participants_payants"/></p>
							
							<p class="formulaire"><label> Dont non-payants : </label> <input type="text" name="dont_non_payants" id="participants_non_payants"/></p>
							
							<p class="formulaire"><label> Dont étudiants : </label> <input type="text" name="dont_etudiants" id="participants_etudiants"/></p>
							
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend><span class="numbere">7</span>Conférenciers</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Nombre total de conférenciers prévus : </label>	<input type="text" name="nb_conferenciers" id="nb_total_conferenciers"/></p>
							
							<p class="formulaire"><label> Dont Université Paris 13 : </label> <input type="text" name="dont_Paris13" id="conferenciers_paris13"/></p>
							
							<p class="formulaire"><label> Dont France : </label> <input type="text" name="dont_France" id="conferenciers_etrangers"/></p>
							
							<p class="formulaire"><label> Dont Etranger : </label> <input type="text" name="dont_Etranger" id="conferenciers_etrangers"/></p>
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend><span class="numbere">8</span>Droits d'incription</legend>
					<!--------------------->
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">

							<p class="formulaire"><label> Participant plein tarif : </label>	<input type="text" name="plein_tarif" id="participants_plein_tarif"/></p>
														
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
							<textarea name="conditions_invitation" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>
							
							<p><strong>Conditions de subvention de participants étudiants :</strong></p>
							<p>Préciser s’il est prévu des subventions spécifiques pour la participation des étudiants.</p>
							<textarea name="conditions_subvention_participants_etudiants" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>
							
							<p><strong>Conditions d’organisation :</strong></p>
							<p>Préciser de quel appui logistique éventuel vous disposez pour l’organisation et en particulier pour le laboratoire.</p>
							<textarea name="conditions_organisation" wrap="off" cols="30" rows="5"  id="logistique"/></textarea>

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

							<p class="formulaire"><label> - établissements privés : </label> <input type="text" name="etablissement_prives" id="etablissements_prives"/></p>
						
							<p><strong> Subventions sollicitées : </strong></p>

							<p class="formulaire"><label> - Ministère Enseignement Supérieur et Recherche :</label> <input type="text" name="ministere_enseignement_sup_recherche" id="ministere_esr"/></p>

							<p class="formulaire"><label> - Ministère Affaires Etrangères : </label> <input type="text" name="ministere_affaires_etrangeres" id="ministere_ae"/></p>

							<p class="formulaire"><label> - Autres Ministères: </label><input type="text" name="autres_ministeres" id="autres_ministeres"/></p>

							<p class="formulaire"><label> - Union Européenne: </label> <input type="text" name="union_europeenne" id="union_europeenne"/></p>

							<p class="formulaire"><label> - Municipalité :</label> <input type="text" name="municipalite" id="municipalite"/></p>

							<p class="formulaire"><label> - Conseil Régional : </label> <input type="text" name="conseil_regional" id="conseil_regional"/></p>
						
							<p class="formulaire"><label> - Conseil Général : </label> <input type="text" name="conseil_general" id="conseil_general"/></p>	
							
							<p class="formulaire"><label> - C.N.R.S. : </label> <input type="text" name="CNRS" id="cnrs"/></p>

							<p class="formulaire"><label> - INSERM :</label> <input type="text" name="INSERM" id="inserm"/></p>

							<p class="formulaire"><label> - Autres EPST ou EPIC : </label> <input type="text" name="autres_EPST_ou_EPIC" id="epst_epic"/></p>
						
							<p class="formulaire"><label> - Organismes privés (fondations, associations…préciser) : </label> <input type="text" name="organismes_prives" id="org_prives"/></p>	

							<p class="formulaire"><label> - Autres organismes (préciser): </label> <input type="text" name="autres_organismes" id="autres_org"/></p>

							<p class="formulaire"><label> - Subvention demandée à l’Université Paris 13 :  </label> <input type="text" name="subvention_demande_a_Univ_Paris13" id="subventions_p13"/></p>
												
						</div>
					</div>
					</br>
					<div class="masquable ferme">
						<h2 class="masquable-titre"><span>+</span></h2>
						<div class="masquable-contenu">
						
							<p><strong>Dépenses prévues</strong></p>
														
							<p class="formulaire"><label> Publicité, courrier, téléphone : </label> <input type="text" name="publicite_courrier_tel" id="pub_courrier_tel"/></p>
							
							<p class="formulaire"><label> Fournitures (bloc-notes, badges..) : </label> <input type="text" name="fournitures" id="fournitures"/></p>

							<p class="formulaire"><label> Location de salles de conférences : </label> <input type="text" name="location_salle_conference" id="location"/></p>
						
							<p class="formulaire"><label> Repas, cocktail : </label> <input type="text" name="repas" id="repas"/></p>

							<p class="formulaire"><label> Secrétariat (salaires, vacations..) : </label> <input type="text" name="salaire_secretariat" id="secretariat"/></p>

							<p class="formulaire"><label> Frais de séjour (hôtel..) : </label> <input type="text" name="frais_de_sejour" id="frais_sejour"/></p>

							<p class="formulaire"><label> Frais de transports : </label><input type="text" name="frais_de_transport" id="frais_transport"/></p>

							<p class="formulaire"><label> Subventions de participation : </label> <input type="text" name="subvention_participation" id="subventions_participation"/></p>

							<p class="formulaire"><label> Indemnités conférenciers : </label> <input type="text" name="indemnites_conferenciers" id="indemnites_conferenciers"/></p>

							<p class="formulaire"><label> Montage de stands : </label> <input type="text" name="montage_stands" id="montage_stand"/></p>
						
							<p class="formulaire"><label> Gestion de dossiers : </label> <input type="text" name="gestion_dossiers" id="gestion_dossier"/></p>	
							
							<p class="formulaire"><label> Traduction simultanée : </label> <input type="text" name="traduction_simultanee" id="traduction"/></p>

							<p class="formulaire"><label> Autres frais (préciser) : </label> <input type="text" name="autres" id="autres_frais"/></p>

							<p class="formulaire"><label> <strong>TOTAL DEPENSES :</strong> </label> <input type="text" name="total" id="total_depenses"/></p>
						
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
