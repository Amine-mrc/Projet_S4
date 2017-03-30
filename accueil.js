$(document).ready(function(){
	
	$('#menu li').click(function(){
		if($(this).hasClass("active")){
			console.log("ok");
		}
		else{
			console.log("fonctionne");
			$(this).addClass("active");
		}
	});
	
});