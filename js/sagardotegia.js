$(document).ready(function(){

    google.maps.event.addDomListener(window, 'load', initialize());

		$.backstretch([
	          "img/txotx.jpg",
	          "img/slide.jpg",
	          "img/sidra.jpg"
	        ], {
	            fade: 750,
	            duration: 4000
	        });

	   $("#btnbidali").click(function(evento){
            evento.preventDefault();
            $("#okerra").load("guardarComentarios.php", {iruzkina: $("#text_iruzkina").val()}, function(response){
                if(response==""){
                    location.reload();
                }else{
                    $("#okerra").text(response);
                }
            });
            
        });

        $("#comentarios").click(function(){
            $("#iruzkin").toggle();
        });

        $("#argazkiak").click(function(){
            $("#googleMap").hide();
            $("#slider").show();
        });

        $("#mapa").click(function(){
            $("#googleMap").show();
            $("#slider").hide();
        });

        $("#iriki").click(function(){
            
                $("#login").toggle();
                $("#erabiltzaileaLog").focus();
            
        });

        $("#itxi").click(function(){
            location.href="logout.php";
        });


        $("#user").click(function(){
            if($('#erabiltzaileaLog').val()=="Admin"){
                location.href="admin.php";
            }
            else{
                location.href="perfil.php"
            }
        });

            /* VALIDAR LOGIN */
        $("#butsartu").click(function(evento){
            evento.preventDefault();
            if($("#erabiltzaileaLog").val()=="" && $("#pasahitzaLog").val()==""){
                $("#aviso").text("Ezin dira hutsik egon");
            }else{
                $("#aviso").load("login.php", {user: $("#erabiltzaileaLog").val(), pass: $("#pasahitzaLog").val()}, function(response){
                    if(response==""){
                        location.reload();
                    }else{
                        $("#aviso").text(response);
                    }
                });
            }
        });
    });