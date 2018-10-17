<?php 
	require_once '../Connections/connection.php';

	$sql3="SELECT * FROM `tbleducadora`, `tblzona` WHERE `tbleducadora`.`id_zona` like `tblzona`.`id_zona`";
	$c=mysqli_query($con, $sql3);

$id_educadora = $_POST['id_educadora'];
$nome_educadora = $_POST['nome_educadora'];
$apelido_educadora = $_POST['apelido_educadora'];
$contacto_educadora = $_POST['contacto_educadora'];
$email_educadora = $_POST['email_educadora'];
$id_zona = $_POST['id_zona'];
$foto = $_POST['foto'];	
?>


<form id="form" action ="../display/rg_actualizarEducadora.php" method="post">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome" required value="<?php echo (isset($nome_educadora)) ? $nome_educadora: ''?>">
		<input type="hidden" class="md-input" name="educadora" id="educadora"  value="<?=$_POST['id_educadora']?>">
		<label style="padding-left:10px">Nome Educadora</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" id="apelido" required value="<?php echo (isset($apelido_educadora)) ? $apelido_educadora: ''?>">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" id="cell" required value="<?php echo (isset($contacto_educadora)) ? $contacto_educadora: ''?>">
		<label style="padding-left:10px">Cell</label>
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="email" id="email" required value="<?php echo (isset($email_educadora)) ? $email_educadora: ''?>">
		<label style="padding-left:10px">Email</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			
<?php
				foreach ($c as $linha)
			{
			  $id_educadora = $linha['id_educadora'];	
			  $nome_zona = $linha['nome_zona'];
              echo "<option value='$id_educadora'>$nome_zona</option>";
			  
			}
?> 
		</select>
	</div>
	
	<div class="row" align="center">
		<div class="form-group col-md-6" >
			<img class="img-rounded" name="foto" id="foto" src="../assets/images/usuarios/avatarMulher.jpg" width="75" height="75">
				 <div class="form-file">
					<input type="file" name="foto" value="" id="foto">
					<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>
				</div>
		</div>
	</div>
	 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subEducadora" id = "subEducadora"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
 </div>
</form>