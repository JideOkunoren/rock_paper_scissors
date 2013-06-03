$(document).ready(function(){

	$('.attack').click(function(event){ 
	 
		var attack  =  $(this).attr('href');
		$("#results").load( attack).hide().fadeIn('medium');
		event.preventDefault();
	});	
});