console.log("JS chargé")
$(document).ready(function(){
	
	$('#menu li').click(function(){
		
		if($('#menu li').is("#active2")){
			console.log("a id active");
			$(this).attr('id', '');
			alert("ok");
		}
		else{
			console.log("n'a pas la id");
			$(this).attr('id', 'active2');
		}
	});
	
});
