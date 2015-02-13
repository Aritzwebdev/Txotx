				function logout(){
                    location.href="logout.php";
                }

                function perfil(){
                    location.href="perfil.php";
                }
                $(document).ready(function(){
                
	                $('#borrar').hide();
	        		$('#anadir').hide();
	        		$('#usuarios').hide();
	        		$('#comentarios').hide();

	        		$('#borrarSagardotegi').click(function(){
	            		$('#borrar').show();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});
	        		$('#borrarUsuarios').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').show();
	            		$('#comentarios').hide();
	            	});	
	        		$('#anadirSagardotegi').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').show();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});

	            	$('#borrarComentarios').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').show();
	            	});	

	            	$('img').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});

                window.addEventListener('resize', function(){
                    if($(window).width() <= 800){

                      $("#autores").text("Copyleft");

                    }else{
                      $("#autores").text("Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015");
                    }

              
                });
            });
                
                
                /*  API PARA VALIDAR FORMULARIO DE REGISTRO  */

                function iniciar(){
                	izena=document.getElementById("izena");
                	izena.addEventListener("input", validacion, false);
                	herria=document.getElementById("herria");
                	herria.addEventListener("input", validacion, false);
                	helbidea=document.getElementById("helbidea");
                	helbidea.addEventListener("input", validacion, false);   
               		probintzia=document.getElementById("probintzia");
                	probintzia.addEventListener("input", validacion, false);
                 	email=document.getElementById("email");
                 	email.addEventListener("input", validacion, false);
                 	sintaxis="!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/";
                 	telefonoa=document.getElementById("telefonoa");
                  	telefonoa.addEventListener("input", validacion, false);
                  	validacion();
                }
                

                function validacion(){
                    //validacion izena
        	        if(izena.value==""){
        	          izena.setCustomValidity('Sartu izena');   
        	        }else{
        	          izena.setCustomValidity('');   
        	        }

        	    	//validacion herria
        	        if(herria.value==""){
        	        	herria.setCustomValidity('Sartu herria');
        	        }else{
        	          herria.setCustomValidity('');      
        	        }

        	    	//validacion deskribapena
        	        if(helbidea.value==""){
        	        	helbidea.setCustomValidity('Sartu helbidea');  
        	        }else{
        	        	helbidea.setCustomValidity(''); 
        	        }

        	    	//validacion probintzia
        	        if(probintzia.value==""){
        	        	probintzia.setCustomValidity('Sartu probintzia');
        	        }else{
        	        	probintzia.setCustomValidity('');
        	        }

        	    	//validacion email
        	        if (email.value==""){
        	        	email.setCustomValidity('Sartu email');
        	        }else{
        	        	email.setCustomValidity('');
        	        }

        	    	//validacion telefonoa
        	        if(telefonoa.value==""){
        	        	telefonoa.setCustomValidity('Sartu telefonoa');
        	        }else{
        	        	  telefonoa.setCustomValidity('');
        	        }
                
                }

                window.addEventListener("load", iniciar, false);
            