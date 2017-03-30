<?php session_start(); ?>
<!DOCTYPE html>
		

<html>

  <head>

    <meta charset="utf-8">

    <title>Demande de subventions</title>

	<link rel="stylesheet" href="Demande.css">

	

  </head>

  

   <body>



	<div class="bordereau">
		<img id="logo" src="logoparis13.png" alt="Logo iut" height="75" width="170" align="right"  >
		
		<ul id="menu">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="TableaudeBord.php">Tableau de bord </a> </li>
         
              <li id="active2"><a href="#">Demande de subvention</a>
                <ul> 
                        <li><a href="Demande.php"> Informations </a> </li>
                        <li><a href="Demande_subvention1.php"> Demande pour actes de colloques</a></li>
                        <li><a href="Demande_subvention2.php"> Demande de manifestation scientifique </a> </li>
                        
                </ul> </li>
                        <li><a href="https://www.univ-paris13.fr/bred/">En savoir plus</a></li>
		</ul>
        
		
		<div id="searchbar"> <!-- Barre de recherche !-->
			<form action="" class="formulaire">
				<input class="champ" type="text" value="     Recherche..."/>
                                <input class="bouton" type="button" value=" " />
                        </form>
               </div>
		
		<p> Demande </p>
		<hr width=190px align=left > 
		<p id="pgeX"> Bienvenue Mr/Mme <?php echo $_SESSION['login'] ?></p>
		
		<div id="boutondeconnexion" >
			<form action="" class="deconnexion" >
				<input class="bouton" type="button" name="deconnexion" value="" onclick="self.location.href='deconnexion.php'"/>
				
                        </form> 
		</div>

		
	</div> <!-- Fin div bordereau !-->
   


		<hr id = "grdebarre" width=1020px >

 

           

 <div class="par">



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
				//////////////////////////////////////////////////////////////////insertion table coordinateur
				
				$sql = 'INSERT INTO coordinateur (nom_co, prenom_co, qualite_co, composante_co, laboratoire_co, tel_co, mail_co) VALUES (:nom_co, :prenom_co ,:qualite_co ,:composante_co ,:laboratoire_co ,:tel_co ,:mail_co)';
				
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
						$req->execute();
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



	

?>



<section class="subvention_actes">

<center><h2> FORMULAIRE DE DEMANDE DE SUBVENTION POUR PUBLICATION D’ACTES DE COLLOQUE
 OU D’OUVRAGES THEMATIQUES COLLECTIFS </h2></center><br/>

<hr>
<p>Remplir les informations obligatoire avec *</p>
<script language="Javascript">
function verif_nombre(champ)
  {
	var chiffres = new RegExp("[0-9]");
	var verif;
	var points = 0;
 
	for(x = 0; x < champ.value.length; x++)
	{
            verif = chiffres.test(champ.value.charAt(x));
	    if(champ.value.charAt(x) == "."){points++;}
            if(points > 1){verif = false; points = 1;}
  	    if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
	}
  }
</script>


<form action="Demande_subvention1.php" method="post">

<p><label><strong> Coordinateur Paris 13: </strong></label> 
<p><label> Prénom : </label> <input type="text" name="prenom_co"/></p>
<p><label> Nom : </label><input type="text" name="nom_co"/></p>
<p><label> Qualité : </label><input type="text" name="qualite_co"/></p>
<p><label> Composante : </label> <input type="text" name="composante_co"/></p>
<p><label> Laboratoire : </label><input type="text" name="laboratoire_co"/></p>
<p><label> Téléphone* : </label> <input type="text" placeholder="ex:0666666666" autofocus required pattern="(\d){10}" title="ex:0666666666" name="tel_co"/></p>
<p><label> Mail* : </label> <input type="text" name="mail_co"/></p><br/>


<h3><center> DEMANDE DE SUBVENTION POUR PUBLICATION </h3></center><br/>

<p> <strong>Demande présentée par : </strong></p>
<p><label> Prénom* : </label> <input type="text" name="prenom"></p>
<p><label> Nom* : </label> <input type="text" name="nom"/></p>
<p><label> Qualité* : </label> <input type="text" name="qualite"/></p>
<p><label> Composante* : </label> <input type="text" name="composante"></p>
<p><label> Laboratoire* : </label> <input type="text" name="laboratoire"/></p>
<p><label> Téléphone* : </label> <input type="text" placeholder="ex:0666666666" autofocus required pattern="(\d){10}" title="ex:0666666666" name="tel"/></p>
<p><label> Mail* : </label> <input type="text" name="mail"/></p><br/>

<p> <strong>Description de la publication </strong></p>
<p><label> Type (actes de colloque, ouvrage collectif…) : </label> <input type="text" name="type_publication" id="type"/></p>
<p><label> Nom de publication : </label> <input type="text" name="nom_publication" id="type"/></p>
<p><label> Titre de l’ouvrage : </label> <input type="text" name="titre_ouvrage" id="titre_ouvrage"/></p>
<p><label> Sous la direction de : </label> <input type="text" name="direction" id="direction"/></p>
<p><label> Date prevue : </label> <input type="text" name="date" id="date_prevu"/></p>
<p><label> Editeur : </label> <input type="text" name="editeur" id="editeur"/></p>
<p><label> Collaboration avec une autre université ou institution : </label> <input type="text" name="collaborateur" id="collaboration"/></p>
<p> Nombre des contributions (attendues) : </p>
<p><label> dont Université Paris 13 : </label> <input type="text" name="nb_contribuable_Paris13" id="nb_contrib_P13"/></p>
<p><label> France : </label> <input type="text" name="nb_contribuable_France" id="nb_contrib_fr"/></p>
<p><label> Etranger : </label> <input type="text" name="nb_contribuable_Etranger" id="nb_contrib_etranger"/></p>
<p><label> Doctorants : </label> <input type="text" name="nb_contribuable_Doctorants" id="nb_contrib_doctorant"/></p>
<p><label> Mode de sélection des contributions  : </label> <input type="text" name="mode_selection_contribution" id="mode_de_contribution"/></p>
<p> Reconnaissance de l’éditeur dans la discipline : (Document à fournir signer par la discipline)</p><br/>

<p> <strong>Financement </strong></p>
<p><label> Financement demandé (en €) : </label> <input type="text" name="montant"/></p></br>
<p><label>  Montant de la contribution financière demandée par l’éditeur : </label> <input type="text" name="montant_editeur"/></p>
<p><label> Subvention demandée au CS : </label> <input type="text" name="subvention_demande_au_CS"/></p>
<p><label> Co-financement : </label> <input type="text" name="co_financement"/></p><br/>

<p><strong>Si la subvention est accordée par l’université souhaitez-vous </strong></p>
<p><label> - un virement au laboratoire ? : </label> <input type="radio" name="virement_laboratoire" value="oui"/> Oui <input type="radio" name="virement_laboratoire" value="non"/> Non </p>
<p><label> - une gestion financière au BRED ? : </label> <input type="radio" name="gestion_financiere_bred" value="oui"/> Oui <input type="radio" name="gestion_financiere_bred" value="non"/> Non </p><br/>

<p> Dans les deux cas, 2 exemplaires de l’ouvrage devront être déposés au BRED à l’issue de la publication. Dans le premier cas, une photocopie des factures sera également exigée. </p><br/>

<p><label> Préciser de quel appui logistique vous disposez pour la publication et, en particulier, venant de votre laboratoire : </label> <input type="text" name="appui_logistique" style="width:900px; height:200px;"/></p><br/>


<h4><center>ARGUMENTAIRE AU SOUTIEN DE LA DEMANDE DE SUBVENTION </center></h4><br/>
 
<p><label><strong> Pour les actes de colloque </strong>: argumentaire de deux ou trois pages développant notamment les thématiques du colloque et les approches privilégiées pour la publication en spécifiant la liste des contributeurs et les titres des articles. (3Mo Max conseillé en PDF)</label> 

<input type="hidden" name="MAX_FILE_SIZE" value="3000000"><input type="file" name="argument_actes"/></p><br/>

<p><label><strong> Pour un ouvrage collectif </strong>: argumentaire de deux ou trois pages spécifiant les objectifs du projet, les méthodes et les approches privilégiées, la liste des auteurs ainsi que le titre et un bref résumé des propositions de contribution à la date de la demande. (3Mo Max conseillé en PDF)</label> 

<input type="hidden" name="MAX_FILE_SIZE" value="3000000"><input type="file" name="argument_ouvrage"/></p><br/>

<p> <input type="submit" name="envoyer" value="Enregistrer le dossier" /> </p>

</form>
</section>

              </div>        
<div class="par"> <p>

                   <label for="file">Chargez le formulaire que vous aurez rempli : <br>

                    </label>



                   <input id="file" type="file" name="file" ></input> 

          </div> </p>
     

              <div class="par"> <p> Une fois que vous aurez rempli votre formulaire, appuyez sur Envoyer pour envoyer le formulaire au BRED <br><br>    

                   <input id="boutton_envoyer" type="submit" value="Deposer le dossier" title="Envoyer votre formulaire rempli au BRED" > </input>  

              </div> </p>   

  <!-- Footer !--> 

	<hr id ="grdebarre" width=1020px  >

	

	<footer>

				<ul id="menu-footer">

					<a href="Contact.html" title="Contact">Contact</a>  &nbsp &nbsp

					<a href="" title="Mentions légales">Mentions légales</a>  &nbsp &nbsp 

					<a href="" title="Connexion">Connexion</a>

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
