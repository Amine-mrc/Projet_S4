console.log("Ce programme JS vient d'être chargé");
$(document).ready(function()
{
	console.log("Le document est pret");

	$('.masquable-titre').mousedown(function(e)
		{
			console.log("Le bouton de la souris a été appuyé sur le titre");
			// Seulement le bouton gauche de la souris
			if(e.which!==1){return;}
			// Éviter que l'utilisateur ne sélectionne du texte s'il bouge la souris tout en cliquant
			e.preventDefault();
			var masquable=$(this).parent();
			var contenu=masquable.children('.masquable-contenu');
			// Déterminer si c'est actuellement fermé ou ouvert en regardant la classe
			var ferme=masquable.hasClass("ferme");
			// Changer le + en - ou le "-" en "+"
			masquable.children('.masquable-titre').find('span').text(ferme ? '-' : '+');
			if(ferme)
			{
				masquable.removeClass('ferme');
				// Quand on enleve la classe "ferme", le contenu devient visible... et donc .slideDown() n'a pas d'effet.
				// On doit donc cacher le contenu, et laisser .slideDown() le re-afficher.
				contenu.hide();
				contenu.slideDown();
			}
			else
			{
				// Si on ajoute la classe "ferme" tout de suite, le contenu sera caché, et il n'y aura plus que border-top.
				// Donc... on laisse ouvert jusqu'à la fin de l'animation...
				// Le deuxième argument de .slideUp() est une fonction à appeler quand l'animation est finie.
				contenu.slideUp(400,function(){masquable.addClass('ferme');});
			}
		});

	console.log("La mise en place est finie. En attente d'événements...");
});
