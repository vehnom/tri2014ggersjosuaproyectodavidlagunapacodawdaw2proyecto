$( document ).ready(function() {
    
var btn_inicio_on = false;

	$('.desp_inicio').click(function(){

		if(btn_inicio_on == false){
			$('.sub_inicio').slideDown(250);
			$('.desp_inicio').css("background-color","#7CA3CC");
			btn_inicio_on = true;
		}else{
			$('.sub_inicio').slideUp(250);
			$('.desp_inicio').css("background-color","none");
			btn_inicio_on = false;
		}
	});

	$('.desp_avisos').click(function(){

		if(btn_inicio_on == false){
			$('.sub_avisos').slideDown(250);
			$('.desp_avisos').css("background-color","#7CA3CC");
			btn_inicio_on = true;
		}else{
			$('.sub_avisos').slideUp(250);
			$('.desp_avisos').css("background-color","none");
			btn_inicio_on = false;
		}
	});



});