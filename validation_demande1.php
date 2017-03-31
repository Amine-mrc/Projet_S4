<?php session_start ?>


<?php

	try
	{
		$bd = new PDO('mysql:host=localhost;dbname=testphp	', 'root', '');
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage()); 
	}

	

	if(!(isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["qualite"]) and isset($_POST["composante"]) and isset($_POST["laboratoire"]) and isset($_POST["tel"]) and isset($_POST["mail"]) ))
		echo " ";
	else 
	{
				
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
				
				
				//////////////////////////////////////////////////////////////////insertion table publication 
					
					
				$sql = 'INSERT INTO publication (id_client,type_publication,nom_publication,titre_ouvrage,date_prevue,editeur,direction,collaborateur,nb_contribuable_Paris13,nb_contribuable_France,nb_contribuable_Etranger,nb_contribuable_Doctorants,mode_selection_contribution,appui_logistique) VALUES (:id_client, :type_publication, :nom_publication, :titre_ouvrage, :date_prevue, :editeur, :direction, :collaborateur, :nb_contribuable_Paris13, :nb_contribuable_France, :nb_contribuable_Etranger, :nb_contribuable_Doctorants , :mode_selection_contribution, :appui_logistique)';
				
				try
				{
					$req = $bd->prepare($sql);
					$req->bindValue(':id_client',$_SESSION['id_client']);
					$req->bindValue(':type_publication'		,htmlspecialchars($_POST['type_publication']));
						$req->bindValue(':nom_publication'		,htmlspecialchars($_POST['nom_publication']));
						$req->bindValue(':titre_ouvrage'		,htmlspecialchars($_POST['titre_ouvrage']));
						$req->bindValue(':date_prevue'		,htmlspecialchars($_POST['date']));
						$req->bindValue(':editeur'		,htmlspecialchars($_POST['editeur']));
						$req->bindValue(':direction'		,htmlspecialchars($_POST['direction']));
						$req->bindValue(':collaborateur'		,htmlspecialchars($_POST['collaborateur']));
						$req->bindValue(':nb_contribuable_Paris13'		,htmlspecialchars($_POST['nb_contribuable_Paris13']));
						$req->bindValue(':nb_contribuable_France'		,htmlspecialchars($_POST['nb_contribuable_France']));
						$req->bindValue(':nb_contribuable_Etranger'		,htmlspecialchars($_POST['nb_contribuable_Etranger']));
						$req->bindValue(':nb_contribuable_Doctorants'		,htmlspecialchars($_POST['nb_contribuable_Doctorants']));
						$req->bindValue(':mode_selection_contribution'		,htmlspecialchars($_POST['mode_selection_contribution']));
						$req->bindValue(':appui_logistique'		,htmlspecialchars($_POST['appui_logistique']));
					$req->execute();				
				}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
			
				$sql='select MAX(id_publication) from publication';
				$req = $bd->prepare($sql);
				try	
				{
					$req->execute();
					$tab = $req->fetch(PDO::FETCH_NUM);
					$_SESSION['num_publi'] = (int)$tab[0];
				}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
				
				//////////////////////////////////////////////////////////////////insertion table financement
				
				
				$sql = 'INSERT INTO financement (montant,montant_editeur,subvention_demande_au_CS,co_financement,virement_laboratoire,gestion_financiere_bred,id_publication) VALUES (:montant, :montant_editeur, :subvention_demande_au_CS, :co_financement, :virement_laboratoire, :gestion_financiere_bred, :id_publication)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':montant'	,htmlspecialchars($_POST['montant']));			
						$req->bindValue(':montant_editeur'	,htmlspecialchars($_POST['montant_editeur']));
						$req->bindValue(':subvention_demande_au_CS'	,htmlspecialchars($_POST['subvention_demande_au_CS']));
						$req->bindValue(':co_financement'	,htmlspecialchars($_POST['co_financement']));					
						$req->bindValue(':virement_laboratoire'		,htmlspecialchars($_POST['virement_laboratoire']));
						$req->bindValue(':gestion_financiere_bred'	,htmlspecialchars($_POST['gestion_financiere_bred']));
						$req->bindValue(':id_publication'	,$_SESSION['num_publi']);			
						$req->execute();
					}
				catch(PDOException $e)
				{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
				}
		
		
		//////////////////////////////////////////////////////////////////insertion table coordinateur
				
				$sql = 'INSERT INTO coordinateur (nom_co, prenom_co, qualite_co, composante_co, laboratoire_co, tel_co, mail_co,id_publication) VALUES (:nom_co, :prenom_co ,:qualite_co ,:composante_co ,:laboratoire_co ,:tel_co ,:mail_co, :id_publication)';
				
				try	
					{
						$req = $bd->prepare($sql);
						$req->bindValue(':nom_co'		,htmlspecialchars($_POST['nom_co']));
						$req->bindValue(':prenom_co'	,htmlspecialchars($_POST['prenom_co']));			
						$req->bindValue(':qualite_co'	,htmlspecialchars($_POST['qualite_co']));
						$req->bindValue(':composante_co'	,htmlspecialchars($_POST['composante_co']));
						$req->bindValue(':laboratoire_co'	,htmlspecialchars($_POST['laboratoire_co']));
						$req->bindValue(':tel_co'		,htmlspecialchars($_POST['tel_co']));
						$req->bindValue(':mail_co'		,htmlspecialchars($_POST['mail_co']));
						$req->bindValue(':id_publication'		,$_SESSION['num_publi']);
						$req->execute();
					}
					catch(PDOException $e)
					{
					die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>'); 
					}
			
		/*chdir("./$rep");
		
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
					CREATE TABLE T_CLIENT_CLI 
					(CLI_ID            INT NOT NULL IDENTITY(12485, 1) PRIMARY KEY, 
					 CLI_NOM           CHAR(32) NOT NULL, 
					 CLI_PRENOM        VARCHAR(25))

	
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
			}*/
	}

	$_SESSION['valid1']=true;
	header('Location: Demande_Subvention1.php');
	

?>