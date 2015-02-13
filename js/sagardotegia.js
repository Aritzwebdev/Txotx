$(document).ready(function(){

    // INICIAR MAPA DE GOOGLEMAPS
    google.maps.event.addDomListener(window, 'load', initialize());

        // FUNCION QUE CAMBIA DE IMAGEN DE FONDO AUTOMATICAMENTE CADA 4 SEGUNDOS
		$.backstretch([
	          "img/txotx.jpg",
	          "img/slide.jpg",
	          "img/sidra.jpg"
	        ], {
	            fade: 750,
	            duration: 4000
	        });

        // GUARDA EL COMENTARIO
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

       //MUESTRA LOS COMENTARIOS
        $("#comentarios").click(function(){
            $("#iruzkin").toggle();
        });

        //MUESTRA EL SLIDER DE IMAGENES Y OCULTA EL MAPA
        $("#argazkiak").click(function(){
            $("#googleMap").hide();
            $("#slider").show();
        });

        //MUESTRA EL MAPA Y OCULTA EL SLIDER DE IMAGENES
        $("#mapa").click(function(){
            $("#googleMap").show();
            $("#slider").hide();
        });

        //CIERRA SESION
        $("#itxi").click(function(){
            location.href="logout.php";
        });

        //ABRE LA PAGINA PERFIL DE USUARIO Y SI ES ADMIN VA A LA DE GESTOR DE ADMINISTRADOR
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

    function autoLog(id) {

        var e = document.getElementById(id);
        
        if(e.style.display == 'block'){
            e.style.display = 'none';
                
        }else{

            if($(window).width() <= 800){
                $('#login').animate({ "top":"47%", "left":"15%" }, "slow");
                e.style.display = 'block';
                document.getElementById('erabiltzaileaLog') .focus();
            }else{
                $('#login').animate({ "top":"10.5%", "left":"65%" }, "slow");
                e.style.display = 'block';
                document.getElementById('erabiltzaileaLog') .focus();
            }

            e.style.display = 'block';
            document.getElementById('erabiltzaileaLog') .focus();

        }
    }