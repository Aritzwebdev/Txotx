<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Lista pueblos</title>
<link rel="stylesheet" href="css/bilatu.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

	
	
</head>


<body>
 


        <!-- Cabecera -->
        <header>
            <h1>Parsear o leer JSON con jQuery</h1>
        </header>

        <!-- Contenido -->
        <section>
            
        <div id="taulaHerriak">
			<table class="grilla" id="tablajson">
				<thead>
					<th>Herriak</th>			
				</thead>
				<tbody></tbody>
			</table>
		<div>
			<script type="text/javascript">

			$(document).ready(function(){
				var url="listaPueblos.php";
				$("#tablajson tbody").html("");
				
				$.getJSON(url,function(pueblos){
					$.each(pueblos, function(i,pueblo){
						var newRow =
						"<tr>"
						+"<td>"+pueblo.Herria+"</td>"
						+"</tr>";
						$(newRow).appendTo("#tablajson tbody");
					});
				});
			});

			</script>
 
        </section>

</body>
</html>