
$(document).ready(function(){
$(".btnclass").click(function(){

		var id= $(this).val();
		var array = id.split("&");
		var id_educadora = array[0];
		var nome_educadora = array[1];
		var apelido_educadora = array[2];
		var contacto_educadora = array[3];
		var email_educadora = array[4];
		var id_zona = array[5];
		var foto = array[6];

		var string = "id_educadora="+id_educadora+"&nome_educadora="+nome_educadora+"&apelido_educadora="+apelido_educadora+"&contacto_educadora="+contacto_educadora+"&email_educadora="+email_educadora+"&id_zona="+id_zona+"&foto="+foto;
		
				$.ajax({
					url: "../code/ps_actualizarEducadora.php",
					type: "post",
					data: string,
					cache: false
				}).done(function(data){	
			$(".modal-data").html(data);
		}).fail(function(){
			$(".modal-data").html("<p>Erro ao carregar a Pagina</p>");
		});
		$("#educadora").modal();
		
	});
	
});


