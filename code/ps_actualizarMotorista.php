<?php 
	require_once '../Connections/connection.php';

	$sql3="SELECT * FROM `tblmotorista`, `tblzona` WHERE `tblmotorista`.`id_zona` like `tblzona`.`id_zona`";
	$c=mysqli_query($con, $sql3);
	
	$id_motorista = $_POST['id_motorista'];
    $nome_motorista = $_POST['nome_motorista'];
    $apelido_motorista = $_POST['apelido_motorista'];
    $contacto_motorista = $_POST['contacto_motorista'];
    $email_motorista = $_POST['email_motorista'];
    $id_zona = $_POST['id_zona'];
	$foto_motorista = $_POST['foto_motorista'];
	
?>


<form id="formEducadora" action ="../display/rg_actualizarMotorista.php" method="post">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome" required value="<?php echo (isset($nome_motorista)) ? $nome_motorista: ''?>">
		<input type="hidden" class="md-input" name="motorista" id="motorista"  value="<?=$_POST['id_motorista']?>">
		<label style="padding-left:10px">Nome Motorista</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" id="apelido" required value="<?php echo (isset($apelido_motorista)) ? $apelido_motorista: ''?>">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" id="cell" required value="<?php echo (isset($contacto_motorista)) ? $contacto_motorista: ''?>">
		<label style="padding-left:10px">Cell</label>
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="email" id="email" required value="<?php echo (isset($email_motorista)) ? $email_motorista: ''?>">
		<label style="padding-left:10px">Email</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
		
<?php
			foreach ($c as $linha)
			{
			  $id_motorista = $linha['id_motorista'];	
			  $nome_zona = $linha['nome_zona'];
              echo "<option value='$id_motorista'>$nome_zona</option>";
			  
			}
?> 
		</select>
	</div>
	
	<div class="row" align="center">
		<div class="form-group col-md-6" >
			<img class="img-rounded" name="foto" id="foto" src="../assets/images/usuarios/avat.jpg" width="75" height="75">
				 <div class="form-file">
					<input type="file" name="foto" value="" id="foto">
					<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>
				</div>
		</div>
	</div>
	 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subMotorista" id = "subMotorista"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
</div>
</form>