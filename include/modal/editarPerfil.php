<?php
require_once ('../../Connections/connection.php');
$id = $_POST['id'];

$sql="SELECT * FROM `tblusuario` WHERE `usuarioId` = '$id' ORDER BY `usuarioId` DESC";
$stmt=mysqli_query($con, $sql);
$linha = mysqli_fetch_assoc($stmt);

	 $estado = '';
	 $usuId = $linha['usuarioId'];
	 $nivel = $linha['usuNivelAcesso'];
	 $estado = $linha['UsuarioEstado'];
	 $nome = $linha['nome'];
	 $apelido = $linha['UsuarioApelido'];
	 $usuario = $linha['usuarioNome'];
	 $email = $linha['UsuarioEmail'];
	 $sexo = $linha['UsuarioSexo'];
	 $avatarU = $linha['usuarioAvatar'];
	 $checkedO = '';
	 $checkedU = '';
	 $checkedSM = '';
	 $checkedSF = '';
	 
	 //Sexo
	 if($sexo == "M")
		 $checkedSM = "checked";
	 else
		 $checkedSF = "checked";
	 //Nivel de Acesso
	 if($nivel == 0)
		 $nivel = "Administrador";
	 else if($nivel == 1)
	 {
		 $nivel = "Operador";
		 $checkedO = "checked";
	 }
	 else if($nivel == 2)
	 {
		 $nivel = "Usuario Normal";
		 $checkedU = "checked";
	 }
?>
<form name="form" method="post" action="./rg/updatePerfil.php" enctype="multipart/form-data">   
		  <div class="modal-body text-center p-lg">
			  <div class="row">
				<div class="md-form-group col-md-6">
					<input type="text" class="md-input" name="nome" required value="<?=$nome?>">
					<label>Name</label>
				</div>
				<div class="md-form-group col-md-6">
					<input type="text" class="md-input" name="apelido" required value="<?=$apelido?>">
					<label>Apelido</label>
				</div>
				<div class="md-form-group col-md-6">
					<input type="email" class="md-input email" id="email" name="email" data-toggle="email" data-content="Email j&aacute; Existe" value="<?=$email?>">
					<label>Email</label>
				</div>
				<div class="md-form-group col-md-6">
					<input type="text" class="md-input" name="userName" required value="<?=$usuario?>" readonly>
					<label>User Name</label>
				</div>
			  </div>
			  <div class="row">
				<div align="center" class=" col-md-6">
					<img class="img-rounded dvPreview" name="alunoFoto" src="../assets/images/usuarios/<?=$avatarU?>" width="100" height="100">
					 <div class="form-file">
						<input type="hidden" name="fotoU" value="<?=$avatarU?>">
						<input type="file" name="FotoCadastro" value="" class="fileupload">
						<button class="btn white" style="margin-top: 20%;">Mudar Fotografia</button>
					</div> 
				</div>
				<div align="center" class=" col-md-6">
					 <div class="row" align="left">
						<div class="row">
						<label>Sexo</label>
						</div><!--row-->
						<label class="ui-check">
						  <input type="radio" name="sexo" value="M" <?=$checkedSM?>><i class="dark-white"></i>Masculino
						</label> 
						 <label class="ui-check">
						  <input type="radio" name="sexo" value="F" <?=$checkedSF?>><i class="dark-white"></i>Femenino
						</label> 
					</div><!--row-->
				</div>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
			<input type="submit" name="actualizar" class="btn danger p-x-md submit" id="butao" value="Actualizar">
		  </div>
		  <input type="hidden" id="idU" name="idU" value="<?=$usuId?>">
	  </form>
<script>
$(document).ready(function(){
	//Verificacao dos Campos
	$(".email").keyup(function()
    {
		var email = $(this).val();
		var idU = $("#idU").val();
		var dataString = 'email='+ email+"&idU="+idU;
        $.ajax
		({
				type: "POST",
				url: "../include/varificacaoForm/email.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
                    if(html != 0)
                    {
                        $('input[id="email"]').css({"border-color":"#b71c1c"});
                        $('input[id="butao"]').prop('disabled', true);
						$("[data-toggle='email']").popover('show');
						setTimeout(function () {
							$("[data-toggle='email']").popover('hide');
						}, 2000);
                    }
                    else
                    {
                        $('input[id="email"]').css({"border-color":"#0cc2aa"});
                        $('input[id="butao"]').prop('disabled', false);
						$("[data-toggle='email']").popover('hide');
                    }
				} 
		});
    });
});
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.dvPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(".fileupload").change(function(){
        readURL(this);
    });
</script>