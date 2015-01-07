$(document).ready(function(){      

        $("#enviarT").click(function(mievento) {
                $.ajax({
                    type: 'GET',
                    url: "http://localhost/Txotx/api/respuestaApiUsuarios.php",
                    dataType: "json",
                    success: function(data) {
                        var datos ={
                            user: data.user
                        };
                        
                        //Compilamos el template:
                        var source   = $("#entry-template2").html();
                        var template = Handlebars.compile(source);    
                        var user = template(datos);
                        $("#contenido2").html(user);
                   }
                });
           });

    });