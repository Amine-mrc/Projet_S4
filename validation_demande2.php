<?php session_start ?>

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

	$_SESSION['valid2']=true;
	header('Location: Demande_subvention2.php');

?>
