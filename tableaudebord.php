<?php session_start(); 
require('essaiCAS.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Tableau de bord</title>
	<link rel="stylesheet" href="accueil.css">
	<link rel="stylesheet" href="tableaudebord.css">
	
  </head>
  
 <body>
	
	<div class="bordereau">
		<img id="logo" src="logoparis13.png" alt="Logo iut" height="75" width="170" align="right"  >
		
		<ul id="menu">
        <li><a href="accueil.php">Accueil</a></li>
        <li id="active2"><a href="tableaudebord.php">Tableau de bord </a> </li>
         
              <li><a href="#">Demande de subvention</a>
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
		</ul> <!-- Fin ul menu !-->
        
		
		
		<hr width=400px align=left > 
		<p id="pgeX">Identifiant utilisateur : <?php echo phpCAS::getUser(); ?> </p>
		<hr width=400px align=left > 
		
		
		
		<hr id = "grdebarre" width=1080px >
		
	</div> <!-- Fin div bordereau !-->
	

	<div class="table-title">

		</div>
		<table class="table-fill">
		<thead>
			<tr>	
				<th class="text-center">Date</th>
				<th class="text-center">Numero de demande</th>
				<th class="text-center">Demande</th>
				<th class="text-center">Etat de validation</th>
				<th class="text-center">Commentaires</th>
				<th class="text-center">Decision finale</th>
				
			</tr>
		</thead>

		<tbody class="table-hover">
			<tr>
				<td class="text-left">31/03/2017</td>
				<td class="text-left">n°00447656</td>
				<td class="text-left">Manifestation scientifique</td>
				<td class="text-left">En cours de saisie</td>
				<td class="text-left"></td>
				<td class="text-left"></td>
			</tr>
			<tr>
				<td class="text-left">03/02/2017</td>
				<td class="text-left">n°00432543</td>
				<td class="text-left">Actes de colloques</td>
				<td class="text-left">En attente du BRED</td>
				<td class="text-left"></td>
				<td class="text-left"></td>
			</tr>
			
			<tr>
				<td class="text-left">14/11/2016</td>
				<td class="text-left">n°00402344</td>
				<td class="text-left">Manifestation scientifique</td>
				<td class="text-left">En attente d'informations</td>
				<td class="text-left">A joindre : argumentaire                   <input id="file" type="file" name="file" value="toto" ></input> </td>
				<td class="text-left"></td>
			</tr>

			<tr>
				<td class="text-left">05/05/2016</td>
				<td class="text-left">n°00367876</td>
				<td class="text-left">Manifestation scientifique</td>
				<td class="text-left">Validé par le BRED</td>
				<td class="text-left">Dossier complet</td>
				<td class="text-left">Attribution : OK <a href=""><img id="logo" src="pdf.png" alt="Logo iut" height="45" width="45" align=right></a></td>
			</tr>
			
			
		
		</tbody>
		</table>
  

 
	
	<!-- Footer !-->
	<hr id = "grdebarre2" width=1020px  >
	
	<footer>
				<ul id="menu-footer">
					<a href="" title="Contact">Contact</a>  &nbsp &nbsp
					<a href="" title="Mentions légales">Mentions légales</a>  &nbsp &nbsp 
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
