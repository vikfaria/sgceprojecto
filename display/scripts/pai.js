
$(document).ready(function(){
	$(".updatencarregado").click(function(){
		
		
		var id= $(this).val();
		var array = id.split("&");
		var id_encarregado = array[0];
		var nome_encarregado = array[1];
		var apelido_encarregado = array[2];
		var contacto_encarregado = array[3];
		var email_encarregado = array[4];
		var id_zona = array[5];
		var foto = array[6];
		
		var string = "id_encarregado="+id_encarregado+"&nome_encarregado="+nome_encarregado+"&apelido_encarregado="+apelido_encarregado+"&contacto_encarregado="+contacto_encarregado+"&email_encarregado="+email_encarregado+"&id_zona="+id_zona+"&foto="+foto;
				
				$.ajax({
					url: "../code/ps_actualizarEncarregado.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upEncarregado").modal();
		
	});
	
});

