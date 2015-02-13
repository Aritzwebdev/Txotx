				
                $(document).ready(function(){
                
                    //OCULTAR TODOS LOS FORMULARIOS
	                $('#borrar').hide();
	        		$('#anadir').hide();
	        		$('#usuarios').hide();
	        		$('#comentarios').hide();

                    // FUNCION ENSEÑAR FORMULARIO BORRAR SIDRERIA
	        		$('#borrarSagardotegi').click(function(){
	            		$('#borrar').show();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});

                    // FUNCION ENSEÑAR FORMULARIO BORRAR USUARIO
	        		$('#borrarUsuarios').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').show();
	            		$('#comentarios').hide();
	            	});	

                    //FUNCION ENSEÑAR FORMULARIO AÑADIR SIDRERIA
	        		$('#anadirSagardotegi').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').show();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});

                    //FUNCION ENSEÑAR FORMULARIO BORRAR COMENTARIOS
	            	$('#borrarComentarios').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').show();
	            	});	

                    //FUCION OCULATAR TODOS LOS FORMULARIOS
	            	$('img').click(function(){
	            		$('#borrar').hide();
	            		$('#anadir').hide();
	            		$('#usuarios').hide();
	            		$('#comentarios').hide();
	            	});

                // LISTENER RESPONSIVE
                window.addEventListener('resize', function(){
                    if($(window).width() <= 800){

                      $("#autores").text("Copyleft");

                    }else{
                      $("#autores").text("Copyleft Aritz Etxegia, Rubén Aparicio y Lander Reyes 2014 / 2015");
                    }

              
                });
            });
                
                // FUNCION CERRAR SESION
                function logout(){
                    location.href="logout.php";
                }

                // FUNCION IR A PERFIL.PHP
                function perfil(){
                    location.href="perfil.php";
                }

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
            