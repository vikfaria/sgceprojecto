
$(document).ready(function(){
$(".btnclas").click(function (){
	
        var id= $(this).val();
		var array = id.split("&");
		var id_aderencia = array[0];
		var id_aluno = array[1];
		var id_zona = array[2];
		var id_percurso = array[3];
		var id_carrinha = array[4];
		var id_educadora = array[5];
		var foto = array[6];

		
		var string = "id_aderencia="+id_aderencia+"&id_aluno="+id_aluno+"&id_zona="+id_zona+"&id_percurso="+id_percurso+"&id_carrinha="+id_carrinha+"&id_educadora="+id_educadora+"&foto="+foto;
				
				$.ajax({
					url: "../code/ps_actualizarservicoTransporte.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upservicotrans").modal();
		
	});

	
});

