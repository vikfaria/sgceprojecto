
$(document).ready(function(){
	$(".updatescola").click(function(){
		
		
		var id= $(this).val();
		var array = id.split("&");
		var id_escola = array[0];
		var nome_escola = array[1];
		var contacto_escola = array[2];
		var id_zona = array[2];

		var string = "id_escola="+id_escola+"&nome_escola="+nome_escola+"&contacto_escola="+contacto_escola+"&id_zona="+id_zona;
				
				$.ajax({
					url: "../code/ps_actualizarEscola.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upescola").modal();
		
	});
	
});

