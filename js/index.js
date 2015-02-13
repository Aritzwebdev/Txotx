$(document).ready(function(){ 

      //PERFIL SI ES ADMIN ENTRA DIRECTAMENTE EN LA PAGINA DE GESTOR DE ADMINISTRACION
        $("#user").click(function(){
          if($("#erabiltzaileaLog").val()=="Admin"){
            location.href="admin.php";
          }else{
            location.href="perfil.php";
          }
        });     

        //CERRAR SESION
        $("#itxi").click(function(){
          location.href="logout.php";
        });

        // LISTA DE PUEBLOS CON SIDRERIAS POR PROVINCIA
        $("#giputxi").click(function(){

            document.location.href="zerrenda.php?probintzia=1";

        });

        $("#bizka").click(function(){
           
            document.location.href="zerrenda.php?probintzia=2";
            
        });

        $("#nafar").click(function(){
            
            document.location.href="zerrenda.php?probintzia=3";
            
        });

        $("#arab").click(function(){
           
            document.location.href="zerrenda.php?probintzia=4";
          
        });

        $("#ipar").click(function(){
           
            document.location.href="zerrenda.php?probintzia=5";
          
        });

        // BUSCADOR SIDRERIAS
        $("#bilaketa").click(function(){
            var sagardotegia=$("#sagardotegia").val();
            if(sagardotegia==""){
               
            }else if(sagardotegia=="Sagardotegia..."){

            }else{
                document.location.href="zerrendaSagardo.php?Sagardotegia="+sagardotegia;
            }
            
        });

        //LOGIN
        $("#butsartu").click(function(evento){
            evento.preventDefault();
            if($("#erabiltzaileaLog").val()=="" && $("#pasahitzaLog").val()==""){
                $("#aviso").text("Ezin dira hutsik egon");
            }else{
                $("#aviso").load("login.php", {user: $("#erabiltzaileaLog").val(), pass: $("#pasahitzaLog").val()}, function(response){
                    if(response==""){
                        location.reload();
                    }else if(response == " "){
                        location.href="admin.php";
                    }else{
                        $("#aviso").text(response);
                    }
                });
            }
        });

        // CREACION DEL NUMERO SECRETO ALEATORIO
        function randomgen()
        {
            var rannumber='';
            for(ranNum=1; ranNum<=6; ranNum++){
                rannumber+=Math.floor(Math.random()*10).toString();
            }
            $('#secret').text(rannumber);
        }

        if ($("#secret")) randomgen();
        
        $(".refresh").bind("click",function(e){ e.preventDefault();randomgen(); });
        
        $.validator.addMethod("antispam", function(antispam) 
        {
            if ( antispam==$("#secret").text() ) return true;
        });


        // LISTENER FIN DE VIDEO
        document.getElementById("media-video").addEventListener("ended", function(){
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').animate({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").css({"left": "145%"}, "slow");
            },false);

        // FUNCION TRAER VIDEO
            $('#butPlay').click(function(){

              if($(window).width() <= 800){
                
                $('#media-player').show('slow');
                $("#media-player").animate({"left": "11%"}, "slow");

                /*if ($('#media-player').is (':visible') && $('#media-player').parents (':hidden').length == 0){
                  $("#media-player").animate({"top": "50%"}, "slow");

                  $('#media-video').css({ 'width':'305px', 'height':'160px' });
                  $('#progress-bar').css({ 'width':'172px'});

                  $("#media-player").animate({"left": "137%"}, "slow");
                  $('#media-player').hide('slow');
                  //$('#media-player').css({'display' : 'none'});
                  alert('visible');
                */
              }else{
                  //alert('no visible');
                  //$('#media-player').css({'display' : 'block'});
                  $('#media-player').show('slow');
                  $("#media-player").animate({"left": "35%"}, "slow");
                  $("#media-player").animate({"top": "35%"}, "slow");
                  $('#media-video').animate({ 'width':'385px', 'height':'240px' });
                  $('#progress-bar').css({ 'width':'160px'});
                  
                //}
              }
                      
            }); 
               
          // FUNCION INICIAR VIDEO RESPONSIVE
            $('.play').click(function(){

              if($(window).width() <= 800){

                $("#media-player").animate({"top": "42.5%"}, "slow");
                $('#media-player').animate({"left": "2%"}, "slow");

                $('#media-video').animate({ 'width':'385px', 'height':'240px' });
                $('#progress-bar').animate({ 'width':'160px'});

              }else{

                $("#media-player").animate({"top": "20%"}, "slow");
                $('#media-player').animate({"left": "22.5%"}, "slow");

                $('#media-video').animate({ 'width':'750px', 'height':'425px' });
                $('#progress-bar').css({ 'width':'625px'});

              }

            });

          // FUNCION TERMINAR VIDEO Y ESCONDERLO
            $('.stop').click(function(){
                
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').animate({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").animate({"left": "145%"}, "slow");

            });

          // LISTENER RESPONSIVE
            window.addEventListener('resize', function(){
                if($(window).width() <= 800){
                  $("#autores").text("Copyleft");

                  $('#sidres').click(function(){

                      if ($('#nav ul.subs').is (':visible') && $('#nav ul.subs').parents (':hidden').length == 0){
                        
                        $('#nav ul.subs').hide('fast');
                        $("#nav ul.subs").css({"display": "block"});
                        $("#nav #hasi").css({"margin-top": "0%"}, "slow");
                        $("#nav #user").css({"margin-top": "0%"}, "slow");

                        $("#subtitulo").css({"display": "block"});
                        $("#bilatu").css({"display": "block"});

                      }else{

                        $("#nav #hasi").css({"margin-top": "52%"}, "slow");
                        $("#nav #user").css({"margin-top": "74%"}, "slow");
                        $('#nav ul.subs').show('fast');
                        $("#nav ul.subs").css({"display": "none"});

                        $("#subtitulo").css({"display": "none"});
                        $("#bilatu").css({"display": "none"});

                      }

                  });

                }else{
                  $("#autores").text("Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015");
                }

              
            });

});
        
        // FUNCION PARAR VIDEO Y ESCONDERLO AL PERDER EL FOCO EL VIDEO.(sin uso)
        function stop(){
            $("#media-player").animate({"top": "50%"}, "slow");

            $('#media-video').animate({ 'width':'305px', 'height':'160px' });
            $('#progress-bar').css({ 'width':'172px'});

            $("#media-player").animate({"left": "145%"}, "slow");
        }  

      // FUNCION DIV LOGIN RESPONSIVE  
        function autoLog(id) {

            var e = document.getElementById(id);
         
            if(e.style.display == 'block'){
              e.style.display = 'none';
            
            }else{

              if($(window).width() <= 800){
                $("#sortu").animate({"top": "50%"}, "slow");
                $('#log').animate({ "top":"30%", "left":"15%" }, "slow");
                e.style.display = 'block';
                document.getElementById('erabiltzaileaLog') .focus();
              }else{
                $('#log').animate({ "top":"5%", "left":"67%" }, "slow");
                e.style.display = 'block';
                document.getElementById('erabiltzaileaLog') .focus();
              }

              e.style.display = 'block';
              document.getElementById('erabiltzaileaLog') .focus();

            }
        }

      // FUNCION DIV REGISTRO RESPONSIVE  
        function autoKont(id) {
          var e = document.getElementById(id);
          if(e.style.display == 'block'){
            e.style.display = 'none';
          
          }else{

            if($(window).width() <= 800){
              $("#sortu").animate({"top": "50%"}, "slow");
              $('#reg').animate({ "top":"5%", "left":"27.5%" }, "slow");
              e.style.display = 'block';
              document.getElementById('erabiltzailea') .focus();
            }else{
              $('#reg').animate({ "top":"5%", "left":"67%" }, "slow");
              e.style.display = 'block';
              document.getElementById('erabiltzailea') .focus();
            }
            
            e.style.display = 'block';
            document.getElementById('erabiltzailea').focus();

          }
        }

      // FUNCION PARA ESCONDER DIV
        function kendu(id) {
          var e = document.getElementById(id);
                
          e.style.display = 'none';
                
        }


        /* API PARA VALIDACIONES CLIENTE */        

        function iniciar(){
          user=document.getElementById("erabiltzailea");
          user.addEventListener("input", validacion, false);
          pass=document.getElementById("pasahitza");
          pass.addEventListener("input", validacion, false);  
          izena=document.getElementById("izena");
          izena.addEventListener("input", validacion, false);
          abizena=document.getElementById("abizena");
          abizena.addEventListener("input", validacion, false);
          email=document.getElementById("email");
          email.addEventListener("input", validacion, false);
          kode=document.getElementById("kodea");
          kode.addEventListener("input", validacion, false);
          validacion();
        }

        function validacion(){
        if(user.value==""){
          user.setCustomValidity('Sartu erabiltzailea');
          
          }else{
          user.setCustomValidity('');
          
        }

        if(pass.value==""){
          pass.setCustomValidity('Sartu pasahitza');
          
        }else if(pass.length < 6){
            pass.setCustomValidity('Pasahitza motzegia da');
           
        }else{
          pass.setCustomValidity('');       
        }

        if(email.value==""){
          email.setCustomValidity('Sartu emaila');
          
          }else{
          email.setCustomValidity('');
        
        }

        if(izena.value==""){
          izena.setCustomValidity('Sartu zure izena');
          
          }else if(izena.value.length < 3){
            izena.setCustomValidity('Izena 3 karaktere edo gehiago eduki behar ditu');
          }
          else{
          izena.setCustomValidity('');
        }

        if(abizena.value==""){
          abizena.setCustomValidity('Sartu zure abizena');
          }else if(abizena.value.length < 3){
            abizena.setCustomValidity('Abizena 3 karaktere edo gehiago eduki behar ditu');
          }else{
          abizena.setCustomValidity('');
        }

        if(kode.value==""){
          kode.setCustomValidity('Sartu ikusten duzun zenbakia');
          }else{
          kode.setCustomValidity('');
        }

        }

        window.addEventListener("load", iniciar, false);