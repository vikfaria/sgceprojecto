
$(document).ready(function(){
	$(".updatemotorista").click(function(){
		
		
		var id= $(this).val();
		var array = id.split("&");
		var id_motorista = array[0];
		var nome_motorista = array[1];
		var apelido_motorista = array[2];
		var contacto_motorista = array[3];
		var email_motorista = array[4];
		var id_zona = array[5];
		var foto_motorista = array[6];
		
//$id_motorista."&".$nome_motorista."&".$apelido_motorista."&".$contacto_motorista."&".$email_motorista."&".$id_zona."&".$foto_motorista

		var string = "id_motorista="+id_motorista+"&nome_motorista="+nome_motorista+"&apelido_motorista="+apelido_motorista+"&contacto_motorista="+contacto_motorista+"&email_motorista="+email_motorista+"&id_zona="+id_zona+"&foto_motorista="+foto_motorista;
				
				$.ajax({
					url: "../code/ps_actualizarMotorista.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upMotorista").modal();
		
	});
	
});

