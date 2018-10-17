$(document).ready(function(){
	$(".updateRotas").click(function(){
		
		
		var id= $(this).val();
		var array = id.split("&");
		var id_rota = array[0];
		var nome_rota = array[1];
		var origem_rota = array[2];
		var destino_rota = array[3];
		var localizacao = array[4];
		var id_carrinha = array[5];
		

		var string = "id_rota="+id_rota+"&nome_rota="+nome_rota+"&origem_rota="+origem_rota+"&destino_rota="+destino_rota+"&localizacao="+localizacao+"&id_carrinha="+id_carrinha;
				
				$.ajax({
					url: "../code/ps_actualizarRotas.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upRotas").modal();
		
	});
	
});

