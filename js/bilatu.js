$(document).ready(function(){

	// OBTENER LISTADO DE PUEBLOS POR JSON Y ESCRIBIR LOS DATOS EN LA TABLA DE 10 EN 10
	var url="listaPueblos.php";
	$("#tablajson tbody").html("");
		
	$.getJSON(url,function(pueblos){
		$.each(pueblos, function(i,pueblo){
		
			if(i < 10){
				var newRow =
				"<tr value='"+pueblo.Herria+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a> ("+pueblo.Kop+")</td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson .taula1");

			}else if(i >= 10 && i < 20){
				var newRow =
				"<tr value='"+pueblo.Herria+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a> ("+pueblo.Kop+")</td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson .taula2");
			
			}else if(i >= 20 && i < 30){
				var newRow =
				"<tr value='"+pueblo.Herria+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a> ("+pueblo.Kop+")</td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson .taula3");
			}else if(i >= 30 && i < 40){
				var newRow =
				"<tr value='"+pueblo.Herria+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a> ("+pueblo.Kop+")</td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson .taula4");
						
			}else{
				var newRow =
				"<tr value='"+pueblo.Herria+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+pueblo.Herria+"</a> ("+pueblo.Kop+")</td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson .taula5");
			}
					
		});
	});

	$(".table").on('click','.tr',function(e){
		e.preventDefault();
		var herria=$(this).attr('value');

		location.href="zerrendaHerria.php?Herria="+herria;
	});

});