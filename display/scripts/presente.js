$(document).ready(function(){
	$(".tbp").click(function(){
		var id= $(this).val();
		var array = id.split("&");
		var aderencia = array[0];
		var estado = array[1];
        var tipo_presenca = array[2];	
        var	estadopresente = 1;	
		$(this).attr("disabled", true);
		var botao = $(this);
		var ausente = (botao.next());
		var cancelar = (ausente.next());
		
		var estadoPresenteButao = (ausente.prop("disabled")).toString();
		
		if(estadoPresenteButao == 'true'){
			updatePresenca(botao);
			ausente.removeAttr("disabled");
		}
		else{
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
						 cancelar.val(data);
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
		}
	});
	
	
	$(".tba").click(function(){
		alert("hello");
		
		var id= $(this).val();
		var array = id.split("&");
		var aderencia = array[0];
		var estado = array[1];
        var tipo_presenca = array[2];	
        var	estadopresente = 2;	
		var botao = $(this);
		botao.attr("disabled", true);
		var presente = (botao.prev());
		var cancelar = (botao.next());
		var estadoPresenteButao = (presente.prop("disabled")).toString();
		
		if(estadoPresenteButao == 'true'){
			updateAusente(botao);
			presente.removeAttr("disabled");
		}
		else {
		var string = "aderencia="+aderencia+"&estado="+estado+"&tipo_presenca="+tipo_presenca+"&location=0&latitude=0&longitude=0&estadopresente="+estadopresente;
		
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
					 cancelar.val(data);
				 }
				 else{
					 botao.removeAttr("disabled");
					 cancelar.attr("hidden", true);
					 alert("Falha");
				 }
				}).fail(function(){
					//alert(data);
					$(this).removeAttr("disabled");
					$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
				}); 
		   }
		
		}); 
	$(".cancelar").click(function(){
		var botao = $(this);
		cancelarPresenca(botao);
		});
	function cancelarPresenca(botao){
		var apaga= botao.val();
		ausente = (botao.prev());
		presente = (ausente.prev());
		
		var string = "apaga="+apaga;
		
		$.ajax({
					type: "post",
					url: "../include/presenca/removerPresenca.php",
					data: string,
					cache: false
				}).done(function(data){
				 if(data){
					 botao.attr("hidden", true);
					 ausente.removeAttr("disabled", true);
					 presente.removeAttr("disabled", true);
				 }
				 else{
					 botao.removeAttr("hidden");
					 alert("Falha");
				 }
				}).fail(function(){
					//alert(data);
					$(this).removeAttr("disabled");
					$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
				});
	}
	
	
	function updatePresenca(botao){
        var	estadopresente = 1;	
		botao.attr("disabled", true);
		var ausente = (botao.next());
		var cancelar = (ausente.next());
		var id = cancelar.val();
		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(showLocation);
			setTimeout(function(){
				alert("ola");
				var loc = $("#location").val();
				var latitude = $("#latitude").val();
				var longitude = $("#longitude").val();
				
				var string = "location="+loc+"&latitude="+latitude+"&longitude="+longitude+"&estadopresente="+estadopresente+"&id="+id;
				//var test=document.getElementById('id').value;
				alert(string);
				$.ajax({
					type: "post",
					url: "../include/presenca/updatePresenca.php",
					data: string,
					cache: false
				}).done(function(data){
					alert(data+"aqui");
				 if(data){
					 botao.attr("disabled", true);
					 cancelar.removeAttr("hidden");
					 cancelar.val(data);
				 }
				 else{
					 ausente.attr("disabled", true);
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
	}
	
	
	function updateAusente(botao){
        var	estadopresente = 2;	
		botao.attr("disabled", true);
		var presente = (botao.prev());
		var cancelar = (botao.next());
		var id = cancelar.val();
		var string = "location=0&latitude=0&longitude=0&estadopresente="+estadopresente+"&id="+id;;
		
		$.ajax({
					type: "post",
					url: "../include/presenca/updateAusente.php",
					data: string,
					cache: false
				}).done(function(data){
					alert(data+"aqui");
				 if(data){
					 botao.attr("disabled", true);
					 cancelar.removeAttr("hidden");
					 cancelar.val(data);
				 }
				 else{
					 botao.removeAttr("disabled");
					 cancelar.attr("hidden", true);
					 alert("Falha");
				 }
				}).fail(function(){
					//alert(data);
					$(this).removeAttr("disabled");
					$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
				});
		
		}

	
	
	
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

 