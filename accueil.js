console.log("JS chargé")
$(document).ready(function(){
	
	$('#menu li').click(function(){
		
		if($('#menu li').is("#active")){
			console.log("a id active");
			$(this).attr('id', '');
		}
		else{
			console.log("n'a pas la id");
			$(this).attr('id', 'active');
		}
	});
	
});
