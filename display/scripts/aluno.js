$(document).ready(function(){
	$(".update").click(function(){
		
		
		var id= $(this).val();
		var array = id.split("&");
		var id_aluno = array[0];
		var nome = array[1];
		var apelido = array[2];
		var zona = array[3];
		var foto = array[4];
		var data = array[5];
		var encarregado = array[6];
		var escola = array[7];

		var string = "id_aluno="+id_aluno+"&nome="+nome+"&apelido="+apelido+"&zona="+zona+"&foto="+foto+"&data="+data+"&encarregado="+encarregado+"&escola="+escola;
				$.ajax({
					url: "../code/ps_actualizarAluno.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#upAluno").modal();
		
	});
	
});

