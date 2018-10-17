$(function(){

	$('#enviar').on('submit',function(){
		var id = $('#idPersona').val();
		var txt = $('#txtSMS').val();
		if(id.length > 0 && txt.length > 0){
			$.ajax({
				type: 'POST',	
				url: '../php/enviarSMS.php',
            	data: 'id='+id+'&txt='+txt,
				beforeSend : function (){	
					$('#respuesta').html('<center><img src="../recursos/cargando.gif" width="50" heigh="50"></center>').show(300);	
				},
				success: function(data){
					if(data == 'OK'){
						$('#respuesta').html('<label style="color:green;">Envio de SMS realizado con exito</label>');	
						return false;	
					}else{
						$('#respuesta').html('<label style="color:red;">Error en el envio del SMS</label>').show(300).delay(3000).hide(300);
						return false;
					}
					alert(data);				
				}	
			});
			return false;	
		}else{
			$('#respuesta').html('<label style="margin-top:20px; color:red;">Selecciona un numero del directorio y escriba su mensaje</label>').show(300).delay(3000).hide(300);
			return false;	
		}
	});

});
