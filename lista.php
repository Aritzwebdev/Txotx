<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<body>
	<div id="herria"></div>
</body>
<script type="text/javascript">
	$(document).ready(function(){ 
	var array; 
		/*$("#herria").load("listaPueblos.php?probintzia=1", function(response){  
				$("#herria").text(response.herria);
		});*/
		$.getJSON("listaPueblos.php", {probintzia: "1"}, function(response){
			array=new Array(response);
			
		});
		$("#herria").text(array);
    });
</script>
</html>