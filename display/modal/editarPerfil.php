<div id="view-modal" class="modal fade animate" tabindex="-1" data-backdrop="true" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" id="animate">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
				<h5 class="modal-title">Cadastrar Fornecedor</h5>
			</div>
			   <div class="modal-body"> 
			   
				   <div id="modal-loader" style="display: none; text-align: center;">
					<img src="ajax-loader.gif">
				   </div>
				   <!-- content will be load here -->                          
				   <div id="dynamic-content"></div>
			</div>
		 </div> 
	  </div>
</div><!-- /.modal -->    




<!-- .modal -->
<div id="editar<?=$usuId?>" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Cadastrar Fornecedor</h5>
      </div>
	  <form name="form" method="post" action="./rg/updateUsuario.php" enctype="multipart/form-data">   
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
					<input type="email" class="md-input email" id="email<?=$email?>" name="email" value="<?=$email?>">
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
					<div class="row" align="left">
						  <div class="row">
							<label>Cargo</label>
						  </div>
						  <div class="radio">
							<label class="ui-check" >
							  <input type="radio" name="cargo" value="1" <?=$checkedO?>>
							  <i class="dark-white"></i>
							  Operador
							</label>
						  </div>
						  <div class="radio" >
							<label class="ui-check">
							  <input type="radio" name="cargo" value="2" <?=$checkedU?>>
							  <i class="dark-white"></i>
							  Usuario Normal
							</label>
						  </div>
					</div>
				</div>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
			<input type="submit" name="actualizar" class="btn danger p-x-md submit" id="butao<?=$email?>" value="Actualizar">
		  </div>
		  <input type="hidden" name="idU" value="<?=$usuId?>">
	  </form>
    </div><!-- /.modal-content -->
  </div>
</div>