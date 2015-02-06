	$(document).ready(function(){

		$("#itxi").click(function(){
			location.href="logout.php";
		});

		$("#elimUsu").click(function(){
			var baja=confirm ("Erabiltzailea ezabatu nahi duzu?");
        		if(baja){
        			location.href = "baja.php";
        		}
        });

		$("#datu").click(function(){
			$("#datuak").show();
			$(".greenBox").hide();
			$("#pass").hide();
			$("#lista").hide();
			$("#butiruzkin").hide();
		});
		$("#iruzkin").click(function(){		
			$("#butiruzkin").show();
			$(".greenBox").show();
			$("#datuak").hide();
			$("#pass").hide();
			$("#lista").hide();
		});
		$("#cambiopass").click(function(){
			$("#datuak").hide();
			$(".greenBox").hide();
			$("#butiruzkin").hide();
			$("#pass").show();
			$("#lista").hide();
		});
		$("#butlista").click(function(){
		 	$("#lista").slideToogle("slow");
		});

	 });

	$.backstretch([
	    "img/txotx.jpg",
	    "img/slide.jpg",
	    "img/sidra.jpg"
	    ], {
	        fade: 750,
	        duration: 4000
	});