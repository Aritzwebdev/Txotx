$(document).ready(function(){

		//$('.bxslider').bxSlider();

		$.backstretch([
	          "img/txotx.jpg",
	          "img/slide.jpg",
	          "img/sidra.jpg"
	        ], {
	            fade: 750,
	            duration: 4000
	        });

	    $("#menu_txiki_herria").click(function(){
			location.href="herria.php";
		});
		$("#bidali").click(function(evento){
            evento.preventDefault();

            if($("#erab").val()=="" && $("#pasahitza").val()==""){
                $("#okerra").text("Ezin dira hutsik egon");
            }else{
            	$("#okerra").load("guardarComentarios.php", {user: $("#erab").val(), pass: $("#pasahitza").val(), iruzkina: $("textarea#iruzkina").val()}, function(response){
                    if(response==""){

                        location.href="sagardotegia.php";
                    }else{
                        $("#okerra").text(response);
                    }
                });
            }
        });

});
