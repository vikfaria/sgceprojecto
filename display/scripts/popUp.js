 $(document).ready(function(){  
      $('.view_data').click(function(){   
           var employee_id = $(this).attr("id"); 	   
           $.ajax({  
                url:"../code/detalhe_carrinha.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                }).done(function(data){
                   $('#employee_detail').html(data);  
                   $('#dataModal').modal("show");  
                }).fail(function(){
			       alert("erro");
		        });
      });  
 });  
 
 