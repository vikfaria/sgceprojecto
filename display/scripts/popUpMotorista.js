 $(document).ready(function(){  

      $('.view_motorista').click(function(){   
           var motorista_id = $(this).attr("id"); 	 
 		   
           $.ajax({  
                url:"../code/detalhe_motorista.php",  
                method:"post",  
                data:{motorista_id:motorista_id},  
                }).done(function(data){
					alert(data);
                   $('#motorista_detail').html(data);  
                   $('#dataMotoritas').modal("show");  
                }).fail(function(){
			       alert("erro");
		        });
      });  
 });  
 
 