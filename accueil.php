<?php session_start(); 
require('essaiCAS.php');
?>﻿
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
	<link rel="stylesheet" href="accueil.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="accueil.js"></script>
	
  </head>
  
   <body>
	
	<div class="bordereau">
		<img id="logo" src="logoparis13.png" alt="Logo iut" height="75" width="170" align="right"  >
		
		<ul id="menu">
        <li id="active2"><a href="accueil.php">Accueil</a></li>
        <li><a href="tableaudebord.php">Tableau de bord </a> </li>
         
              <li><a href="#">Demande de subvention</a>
                <ul> 
                        <li><a href="Demande.php"> Informations </a> </li>
                        <li><a href="Demande_subvention1.php"> Demande pour actes de colloques</a></li>
                        <li><a href="Demande_subvention2.php"> Demande de manifestation scientifique </a> </li>
                        
                </ul> </li>
                        <li><a href="https://www.univ-paris13.fr/bred/">En savoir plus</a></li>
			<li><a href="?logout=">Déconnexion </a></li>
			<?php 
				if (isset($_REQUEST['logout'])) {
 					phpCAS::logout();
				}	
			?>
		</ul>
        
		
	
		<hr width=150px align=left > 
		<p id="pgeX">Identifiant utilisateur : <?php echo phpCAS::getUser(); ?> </p>
		<hr width=150px align=left > 
		<p> n° de la demande : <?php 
			
			$req = $bd->prepare('SELECT id_publication from publication');
			$req->execute();
			$resultat = $req->fetch(PDE::FETCH_ASSOC);
			echo $resultat;
		?> </p> 
		
		<hr id = "grdebarre" width=1080px >
		
		
		
	</div> <!-- Fin div bordereau !-->
	
	<!-- Bloc des chiffres !-->
	<div id="par">
		<center><h1> Informations </h1></center></br>
		    
		 <strong> Témoignage d’une doctorante </strong> </br> </br>
                             Vous découvrirez le cursus d’une étudiante de l’Université Paris 13 devenue doctorante ainsi que sa thèse en cours. Témoignage d’Amena Butt ...  <br><img src="icone.png" alt="Logo iut"  ><a id="img" href="https://www.univ-paris13.fr/temoignage-doctorante-recherche/"> En savoir plus</a> </br> </br> </br>

                    <strong> Commission Recherche </strong> </br> </br>
                             La Commission Recherche est consultée sur les orientations générales relatives à la politique de recherche, à la documentation scientifique et technique. Les actions de la Commission Recherche en formation plénière et restreinte sont différentes. Le secrétariat de la Commission Recherche est assuré par le BRED ... <br><img src="icone.png" alt="Logo iut" > <a id="img" href="https://www.univ-paris13.fr/commission-recherche/"> En savoir plus</a> </br> </br> </br>
                   
                    
                    <strong> Financement BQR de projets scientifiques </strong> </br> </br>
                            Suite aux délibérations de la Commission de la recherche du 10 avril 2015, un appel à projets scientifiques est lancé visant principalement à faire émerger des projets novateurs dans un objectif de percée(s) scientifique(s) tout en renforçant le potentiel de recherche des laboratoires de Paris …<br><img src="icone.png" alt="Logo iut"> <a id="img" href="https://www.univ-paris13.fr/bqr/"> En savoir plus</a> </br> </br> </br> 

                     <strong> Appels d’offres pour les demandes de subvention </strong> </br> </br>
                             Écouter cette page Appel d’offres pour les demandes de subvention pour une manifestation scientifique (colloques et congrès) Procédure Selon les règles fixées par la Commission Recherche du 8 avril 2008, la procédure s’effectuera tout au long de l’année, l’appel d’offres étant permanent. Une révision du formulaire… <br><img src="icone.png" alt="Logo iut"  ><a id="img" href="https://www.univ-paris13.fr/appels-doffres-de-colloques/"> En savoir plus</a> </br> </br> </br>
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
