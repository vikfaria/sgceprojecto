
$(document).ready(function(){
	$(".tbr").click(function(){
		var id= $(this).val();
		var array = id.split("&");
		var aderencia = array[0];
		var estado = array[1];
        var tipo_presenca = array[2];	
        var	estadopresente = 2;	
		$(this).attr("disabled", true);
		var botao = $(this);
		var ausente = (botao.next());
		var cancelar = (ausente.next());
		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(showLocation);
			setTimeout(function(){
				alert("ola");
				var loc = $("#location").val();
				var latitude = $("#latitude").val();
				var longitude = $("#longitude").val();
				
				var string = "aderencia="+aderencia+"&estado="+estado+"&tipo_presenca="+tipo_presenca+"&location="+loc+"&latitude="+latitude+"&longitude="+longitude+"&estadopresente="+estadopresente;
				//var test=document.getElementById('id').value;
				alert(string);
				$.ajax({
					type: "post",
					url: "../include/presenca/marcarPresente.php",
					data: string,
					cache: false
				}).done(function(data){
					alert(data+"aqui");
				 if(data){
					 botao.attr("disabled", true);
					 cancelar.removeAttr("hidden");
					 cancelar.val(2);
				 }
				 else{
					 alert("Falha");
				 }
				}).fail(function(){
					//alert(data);
					$(this).removeAttr("disabled");
					$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
				});
			}, 5000);
		}else{ 
			alert('Geolocation is not supported by this browser.');
		}
	});
	
	function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
	$("#latitude").val(latitude);
	$("#longitude").val(longitude);
    $.ajax({
        type:'POST',
        url: "../include/presenca/getLocation.php",
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
				$("#location").val(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
});

 