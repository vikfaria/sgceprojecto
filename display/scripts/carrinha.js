
$(document).ready(function(){
	$(".updateCarrinha").click(function(){

		var id= $(this).val();
		var array = id.split("&");
		var id_carrinha = array[0];
		var id_tipo_carinha = array[1];
		var lotacao = array[2];
		var matricula = array[3];
		var contacto = array[4];
		var id_motorista = array[5];
		var id_educadora = array[6];
		var foto = array[7];
		
		var string = "id_carrinha="+id_carrinha+"&id_tipo_carinha="+id_tipo_carinha+"&lotacao="+lotacao+"&matricula="+matricula+"&contacto="+contacto+"&id_motorista="+id_motorista+"&id_educadora="+id_educadora+"&foto="+foto;
				
				$.ajax({
					url: "../code/ps_actualizarCarrinha.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upCarrinha").modal();
		
	});
	
});

