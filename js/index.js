$(document).ready(function(){ 

        $("#user").click(function(){
          if($("#erabiltzaileaLog").val()=="Admin"){
            location.href="admin.php";
          }else{
            location.href="perfil.php";
          }
        });     

        $("#itxi").click(function(){
          location.href="logout.php";
        });

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
        $("#bilaketa").click(function(){
            var sagardotegia=$("#sagardotegia").val();
            if(sagardotegia==""){
               
            }else if(sagardotegia=="Sagardotegia..."){

            }else{
                document.location.href="zerrendaSagardo.php?Sagardotegia="+sagardotegia;
            }
            
        });

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

        document.getElementById("media-video").addEventListener("ended", function(){
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').css({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").animate({"left": "145%"}, "slow");
            },false);


            $('#butPlay').click(function(){
               
                if(e.style.display == 'block'){
                  $("#media-player").animate({"top": "50%"}, "slow");

                  $('#media-video').css({ 'width':'305px', 'height':'160px' });
                  $('#progress-bar').css({ 'width':'172px'});

                  $("#media-player").animate({"left": "145%"}, "slow");
                  
                  e.style.display = 'none';
                }else{
                  $("#media-player").animate({"left": "38%"}, "slow");
                }
                
                
            }); 
               
            $('.play').click(function(){

                $("#media-player").animate({"top": "20%"}, "slow");
                $('#media-player').animate({"left": "25%"}, "slow");

                $('#media-video').css({ 'width':'750px', 'height':'425px' });
                $('#progress-bar').css({ 'width':'625px'});

               // terminado();

            });

            $('.stop').click(function(){
                
                $("#media-player").animate({"top": "50%"}, "slow");

                $('#media-video').css({ 'width':'305px', 'height':'160px' });
                $('#progress-bar').css({ 'width':'172px'});

                $("#media-player").animate({"left": "145%"}, "slow");

            });

});

        function stop(){
            $("#media-player").animate({"top": "50%"}, "slow");

            $('#media-video').css({ 'width':'305px', 'height':'160px' });
            $('#progress-bar').css({ 'width':'172px'});

            $("#media-player").animate({"left": "145%"}, "slow");
        }

        function autoLog(id) {
                    var e = document.getElementById(id);
                    if(e.style.display == 'block'){
                        e.style.display = 'none';
                    }
                    else{
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
                    }
                }

                function autoKont(id) {
                    var e = document.getElementById(id);
                    if(e.style.display == 'block'){
                        e.style.display = 'none';
                    }
                    else{
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
                    }
                }

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