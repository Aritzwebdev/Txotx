<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Texto de ayuda en formularios y validaci&oacute;n en contenedor con jQuery y Validation</title>
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet' type='text/css'>
    <style type="text/css">
    *{font-family:Roboto,sans-serif;font-weight:300;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
    body{background:url(http://www.adwe.es/wp-content/themes/adwe/images/logo.png) 50% 20px no-repeat;}
    form {width:600px;margin:100px auto;box-shadow:0 0 50px rgba(0,0,0,0.50);font-size:1em; background-color: black;}
        fieldset{padding:50px 50px 0;border:0; color: white;}
            legend {text-align:center;padding:20px 0 0 0;font-size:1.5em}
                div {clear:both;padding:0 0 20px 0;position:relative}
            
            input[type=text],input[type=email],input[type=number],input[type=password] {padding:10px;border:1px solid #ccc;border-radius:4px;display:block;width:100%;font-size:1em;outline:none;transition: all 0.15s ease-in-out;}
            input:focus {box-shadow: 0 0 5px rgba(255,0,0,1);border:1px solid rgba(255,0,0,0.8);}
            input[type=submit] {padding:10px 20px;border:1px solid #000;border-radius:4px;display:table;width:auto;margin:0 auto;font-size:1em;background:#666;color:#fff; background-color: green;}
            
            #validate{display:none}
            
            ul{margin:0;padding:0;list-style:none}
            ul li{color:red;margin:0}

            #logo{
                position: absolute;
                margin-right: 15px;
                top: 100px;
                left: 400px;
                width: 80px;
                height: 80px;
            }
            #logo2{
                position: absolute;
                margin-left: 15px;
                top: 100px;
                left: 850px;
                width: 80px;
                height: 80px;
            }

    </style>
    
</head>
<body>
    <form action="" method="post" class="datos">
        <fieldset>
            <img id="logo" src="img/logo.png"/>
            <legend> Erregistratu </legend>
            <img id="logo2" src="img/logo.png"/>
            <div id="validate"><ul></ul></div>
            <div>
                <label for="erabiltzailea">Erabiltzailea</label>
                <input type="text" name="erabiltzailea" id="erabiltzailea" class="required" title="Sartu erabiltzaile izena">
            </div>
            <div>
                <label for="pasahitza">Pasahitza</label>
                <input type="password" name="pasahitza" id="pasahitza" class="required" title="Sartu pasahitza">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="required email" title="Sartu emaila">
            </div>
            <div>
                <label for="izena">Izena</label>
                <input type="text" name="izena" id="izena" class="required" title="Sartu zure izena">
            </div>
            <div>
                <label for="abizena">Abizena</label>
                <input type="text" name="abizena" id="abizena" class="required" title="Sartu zure abizena">
            </div>
            <div>
                <label for="kodea">Kode sekretua idatzi: <span id="secret"></span> (<a href="#" class="refresh">aldatu</a>)</label>
                <input type="text" name="kodea" id="kodea" class="required antispam" maxlength="6" minlength="6" title="Sartu ikusten duzun kodea">
            </div>
            <div class="submit">
                <input type="submit" value="Erregistratu">
            </div>
        </fieldset>
    </form>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
    <script>
    function randomgen()
    {
        var rannumber='';
        for(ranNum=1; ranNum<=6; ranNum++){
            rannumber+=Math.floor(Math.random()*10).toString();
        }
        $('#secret').text(rannumber);
    }
    $(document).ready(function()
    {
        
        if ($("#secret")) randomgen();
        
        $(".refresh").bind("click",function(e){ e.preventDefault();randomgen(); })
        
        var container = $('div#validate');
        $("form.datos").validate({ 
            errorContainer: container,
            errorLabelContainer: $("ul", container),
            wrapper: 'li'
        });
        
        $.validator.addMethod("antispam", function(antispam) 
        {
            if ( antispam==$("#secret").text() ) return true;
        });
        
    });
    </script>
    
    
</body>
</html>