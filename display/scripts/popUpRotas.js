 $(document).ready(function(){  
 
      $('.view_rota').click(function(){   
           var rota_id = $(this).attr("id"); 	   
		 
           $.ajax({  
                url:"../code/detalhe_rotas.php",  
                method:"post",  
                data:{rota_id:rota_id},  
                }).done(function(data){
					
                   $('#rota_detail').html(data);  
                   $('#dataRota').modal("show");  
                }).fail(function(){
			       alert("erro");
		        });
      });  
 });  
 
 