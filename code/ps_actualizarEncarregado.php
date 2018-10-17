<?php 
	require_once '../Connections/connection.php';
	
	$id_encarregado = $_POST['id_encarregado'];
    $nome_encarregado = $_POST['nome_encarregado'];
	$apelido_encarregado = $_POST['apelido_encarregado'];
	$contacto_encarregado = $_POST['contacto_encarregado'];
    $email_encarregado = $_POST['email_encarregado'];
	$id_zona = $_POST['id_zona'];
	$foto = $_POST['foto'];
	
	$sql3="SELECT * FROM `tblencarregado`, `tblzona` WHERE `tblencarregado`.`id_zona` like `tblzona`.`id_zona` AND `id_encarregado = '$id_encarregado'";
	$c=mysqli_query($con, $sql3);
?>


<form id="formEducadora" action ="../display/rg_actualizarEncarregado.php" method="post">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome" required value="<?php echo (isset($nome_encarregado)) ? $nome_encarregado: ''?>">
		<input type="hidden" class="md-input" name="encarregado" id="encarregado"  value="<?=$_POST['id_encarregado']?>">
		<label style="padding-left:10px">Nome Encarregado</label>
	  </div>
	  
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" id="apelido" required value="<?php echo (isset($apelido_encarregado)) ? $apelido_encarregado: ''?>">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" id="cell" required value="<?php echo (isset($contacto_encarregado)) ? $contacto_encarregado: ''?>">
		<label style="padding-left:10px">Cell</label>
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="email" id="email" required value="<?php echo (isset($email_encarregado)) ? $email_encarregado: ''?>">
		<label style="padding-left:10px">Email</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($c as $linha)
			{
?>
			<option value="<?=$linha['id_zona']?>"><?=$linha['nome_zona'];?></option>
			 

<?php
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
		<button type="submit" name = "subEncarregado" id = "subEncarregado"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
 </div>
</form>