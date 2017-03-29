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
         
              <li><a href="#">Demande de subvention</a>
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
		
		<p> Informations </p>
		<hr width=150px align=left > 
		<p id="pgeX"> Bienvenue Mr <?php echo $_SESSION['login'] ?></p>
		
		<div id="boutondeconnexion" >
			<form action="" class="deconnexion" >
				<input class="bouton" type="button" name="deconnexion" value="" onclick="self.location.href='deconnexion.php'"/>
				
            </form> 
		</div>
		
		<hr id = "grdebarre" width=1080px >
		
	</div> <!-- Fin div bordereau !-->



         <div class="par">     

                    <p>

                   <strong> Bievenue sur la page de demande de subvention </strong><br><br><br>

                  Pour permettre à la collectivité d’avoir une lisibilité encore plus importante des aides consenties aux associations, les dossiers de demande de subvention doivent impérativement être complets et parvenir au Bureau de la Recherche et des Etudes Doctorale. Vous pouvez télécharger le dossier complet de demande de subvention et la note d'accompagnement dans cette page.  <br> <br>

          </p> </div>

<br> <br>




        
<div class="par">     

                    <p>

                   <strong> Procedure </strong><br><br><br>

         Selon les règles fixées par la Commission Recherche du 8 avril 2008, la procédure s’effectuera tout au long de l’année, l’appel d’offres étant permanent. Une révision du formulaire est prévue afin que les demandes spécifient bien les éléments d’information nécessaires pour renseigner les critères ci-dessous. En attendant cette révision, l’ancien formulaire doit être employé. Les dossiers seront transmis au BRED par les composantes, par voie électronique ou papier, au plus tard 2 mois avant la date de la manifestation. Les composantes devront contrôler la qualité des demandes transmises et leur conformité par rapport à l’appel d’offre et elles indiqueront une appréciation (très favorable ou favorable).  <br> <br>

          </p> </div>

<br> <br>

<div class="par">

                 <strong> Critères de sélection </strong><br><br><br>
 
          Les projets ne seront recevables que si au moins un membre du comité d’organisation et si au moins un des orateurs du colloque ou congrès appartiennent à un laboratoire reconnu de l’université. Le demandeur s’engagera à ce que l’Université Paris 13 soit mentionnée dans tous les documents officiels (annonces, affiches, programme, actes…). Enfin, le laboratoire concerné devra également s’engager sur son implication financière et/ou logistique, attestée par une lettre du directeur, dans l’organisation de la manifestation. La stricte conformité à ces deux critères et ces deux engagements, constatée par le bureau de la CR, entraînera une décision de principe de financement. <br> <br>

          </p> </div>

<br> <br>
  
<div class="par">
                 <strong> Montant du financement </strong><br><br><br>
 
          

                 Celui-ci sera déterminé par les autres critères ci-dessous. </br> </br>

• La localisation du colloque ou congrès sur un des campus de Paris 13 ou non </br>
• Paris 13 organisateur principal ou non</br>
• Colloque ou congrès international, national ou local</br>
• Montage budgétaire équilibré ou non (cofinancements acquis ou demandés, implication de partenaires institutionnels …)</br>
• Nombre de participants potentiels de Paris 13, comme orateurs ou comme simples participants</br>
• Nombre total de participants attendus</br>

La subvention accordée pourra aller de 1000 € à 2000 €, suivant l’importance du colloque ou congrès, pour les manifestations organisées hors Paris 13 ou dont l’organisateur principal n’est pas de Paris 13, et de 1000 € à 4000 € pour des colloques ou congrès organisés sur un des campus de Paris 13 ou dont Paris 13 est l’organisateur principal. <br> <br>

          </p> </div>

<br> <br>


<div class="par">
                 <strong> Instruction des demandes </strong><br><br><br>
 
                          Elle sera faite par l’un des membres du bureau de la Commission Recherche chargé de cette tâche. Le bureau fera une proposition de subvention ou de rejet, ou une demande de complément d’information ou de révision. La Commission Recherche sera informé au fur et à mesure des demandes instruites par le bureau et il sera consulté en cas de demandes posant des problèmes spécifiques. </br></br><br><br><br>

                 <strong> Versement et justification </strong><br><br><br>

Le versement de la subvention pourra être faite directement au laboratoire, si celui-ci le souhaite. Dans ce cas, la justification, sous la forme d’un court bilan scientifique et financier, devra intervenir dans un délai maximum de deux mois après le colloque ou congrès. En cas d’annulation de la manifestation, ou en absence de justification, la subvention devra être restituée. <br> <br>

          </p> </div>

<br> <br>





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
