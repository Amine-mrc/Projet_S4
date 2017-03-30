console.log("JS chargé")
$(document).ready(function(){
	
	$('#menu li').click(function(){
		if($(this).hasClass("active")){
			console.log("a classe active");
		}
		else{
			console.log("n'a pas la classe");
			$(this).addClass("ajoute active");
		}
	});
	
});
