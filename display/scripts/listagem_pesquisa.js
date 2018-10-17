$(document).ready(function(){
	
	$(".calcText").click(function(){
		
		
		var presente = $("#presente").prop('checked');
		var ausente = $("#ausente").prop('checked');
		var percurso = $("#percurso").prop('checked');
		var data = $("#data").val();
		var nomeA = $("#nomeA").val();

		var string = "presente="+presente+"&ausente="+ausente+"&percurso="+percurso+"&data="+data+"&nomeA="+nomeA;
			
				$.ajax({
                type: "post",
                url: "../include/presenca/listagem_pesquisa.php",
                data: string,
                cache: false,
                success: function (html) {
                    $(".tableBody").html(html);
                }
            });
		
	});
	
});