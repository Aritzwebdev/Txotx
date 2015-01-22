<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<body>
	<div id="herria"></div>
	<div id="kop"></div>
</body>
<script type="text/javascript">
	$(document).ready(function(){  
        /*var url="listaPueblos.php";
        $("#tablajson tbody").html("");
        $.getJSON(url, {probintzia: "1"}, function(rawdata){
        	$.each(rawdata, function(i, data){
        		var newRow=""+""+data.Herria+""+""+data.Sagadotegi_kopurua+""+"";
        		$(newRow).appendTo("#tablajson tbody");
        	});
        });*/

		$("#herria").load("listaPueblos.php?probintzia=1", function(response){      
            $("#herria").text(response);
        });
    });
</script>
</html>