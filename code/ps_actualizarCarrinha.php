<?php 
	require_once '../Connections/connection.php';
	
    $sqly="SELECT * FROM `tbl_carinha`";
	$up=mysqli_query($con, $sqly);
	
	$sql1="SELECT * FROM `tblcarinha`,`tbltipocarinha` WHERE `tblcarinha`.`id_carrinha` like `tbltipocarinha`.`id_tipo_carinha`";
	$a=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblcarinha`,`tblmotorista` WHERE `tblcarinha`.`id_motorista` like `tblmotorista`.`id_motorista`";
	$b=mysqli_query($con, $sql3);
	
    $sql="SELECT * FROM `tblaluno`";
	$stmt=mysqli_query($con, $sql);

	$sql2="SELECT * FROM `tblcarinha`,`tbleducadora` WHERE `tblcarinha`.`id_educadora` like `tbleducadora`.`id_educadora`";
	$c=mysqli_query($con, $sql2);
	 
	 $id_carrinha = $_POST['id_carrinha'];
	 $id_tipo_carinha = $_POST['id_tipo_carinha']; 
     $lotacao = $_POST['lotacao'];  
     $matricula = $_POST['matricula'];
     $contacto = $_POST['contacto'];
     $id_motorista = $_POST['id_motorista'];
     $id_educadora = $_POST['id_educadora'];
	 $foto = $_POST['foto'];

?>


<form id="formCarrinha" action ="../display/rg_actualizarCarrinha.php" method="post">
	<div class="row"  align="left">
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Modelo</label>
		<select name="modelo" id="modelo" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
		
<?php
			    foreach ($a as $linha)
			{
			  $id_carrinha = $linha['id_carrinha'];	
			  $nome_tipo_carinha = $linha['nome_tipo_carinha'];
              echo "<option value='$id_carrinha'>$nome_tipo_carinha</option>";
			  
			}
?> 
		</select>
	</div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="lotacao" id="lotacao" required value="<?php echo (isset($lotacao)) ? $lotacao: ''?>">
		<label style="padding-left:10px">Lotação</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="matricula" id="matricula" required value="<?php echo (isset($matricula)) ? $matricula: ''?>">
		<label style="padding-left:10px">Matricula</label>
		<input type="hidden" class="md-input" name="id_carrinha" id="id_carrinha"  value="<?=$_POST['id_carrinha']?>">
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="contacto" id="contacto" required value="<?php echo (isset($contacto)) ? $contacto: ''?>">
		<label style="padding-left:10px">Contacto</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Motorista</label>
		<select name="motorista" id="motorista" id="motorista" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  
<?php
			foreach ($b as $linha)
			{
			  $id_carrinha = $linha['id_carrinha'];	
			  $nome_motorista = $linha['nome_motorista'];
              echo "<option value='$id_carrinha'>$nome_motorista</option>";
			  
			}
?> 
		</select>
	</div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Educadora</label>
		<select name="educadora" id="educadora" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			
<?php
			foreach ($c as $linha)
			{
			  $id_carrinha = $linha['id_carrinha'];	
			  $nome_educadora = $linha['nome_educadora'];
              echo "<option value='$id_carrinha'>$nome_educadora</option>";
			  
			}
?> 
		</select>
	</div>
	
	<div class="row" align="center">
		<div class="form-group col-md-6" >
			<img class="img-rounded" name="foto" id="foto" src="../assets/images/usuarios/avat.jpg" width="75" height="75">
				 <div class="form-file">
					<input type="file" name="foto" value="<?php echo (isset($foto)) ? $foto: ''?>" id="foto">
					<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>
				</div>
		</div>
	</div>
	 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subCarrinha" id = "subCarrinha"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
 </div>
</form>