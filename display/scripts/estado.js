$(document).ready(function(){
	$("#pre").click(function(){
		
		$.ajax({
			type: "post",
			url: "../include/presenca/presencaEstado.php",
			data: "",
			cache: false
		}).done(function(html){
		    
			$(".modal-data").html(html);
			$("#submit").click(function(){
				var estado = $("input[name='estado']:checked").val();
				var presenca = $("input[name='presenca']:checked").val();
				window.location="../display/ps_presenca_alunos_educadora.php?estado="+estado+"&presenca="+presenca;
			});
		}).fail(function(){
			
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		
		$("#marcaPresenca").modal();
	});
});