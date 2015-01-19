<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<body>
<div>
	<form> 
	                         
	    Erabiltzailea: <input type="text" id="erabiltzaileaLog" name="erabiltzaileaLog" />
	            
	    Pasahitza: <input type="password" id="pasahitzaLog"name="pasahitzaLog" />
	                    
	    <input type="button" id="butSartu" value="Sartu" />
	</form>
</div>
<div id="error"></div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#butSartu").click(function(evento){
      		evento.preventDefault();
      		$("#error").load("verificarUser.php", {user: $("#erabiltzaileaLog").val(), pass: $("#pasahitzaLog").val()}, function(){
         		
      		});
   		});
	});
</script>
</html>