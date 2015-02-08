$(document).ready(function(){

	$(document).ready(function(){
		var url="listaSidrerias.php";
		$("#tablajson tbody").html("");
		
		$.getJSON(url,function(sidrerias){
			$.each(sidrerias, function(i,sidreria){
				var newRow =
				"<tr value='"+sidreria.Sagardotegia+"' class='tr'>"
				+"<td>"+ parseInt(i+1) +"<td><a href='#'>"+sidreria.Sagardotegia+"</a></td>"
				+"</tr>";
				$(newRow).appendTo("#tablajson tbody");
			});
		});
	});

	$(".table").on('click','.tr',function(e){

		e.preventDefault();
		var sagardotegia=$(this).attr('value');
		location.href="zerrendaSagardo.php?Sagardotegia="+sagardotegia;

	});

});