<?php 
	require_once '../../../Connections/connection.php';
	

	$sql1="SELECT * FROM `tbltipo_carrinha`";
	$a=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblmotorista`";
	$b=mysqli_query($con, $sql3);
	
    $sql="SELECT * FROM `tblaluno`";
	$stmt=mysqli_query($con, $sql);

	$sql2="SELECT * FROM `tbleducadora`";
	$c=mysqli_query($con, $sql2);
?>


<form id="formCarrinha" action ="../display/rg_carinha.php" method="post">
	<div class="row"  align="left">
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Modelo</label>
		<select name="modelo" id="modelo" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($a as $linha)
			{
?>
			<option value="<?=$linha['id_tipo_carrinha']?>"><?=$linha['nome_tipo_carrinha'];?></option>

<?php
			}
?> 
		</select>
	</div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="lotacao" required value="">
		<label style="padding-left:10px">Lotação</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="matricula" required value="">
		<label style="padding-left:10px">Matricula</label>
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="contacto" required value="">
		<label style="padding-left:10px">Contacto</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Motorista</label>
		<select name="motorista" id="motorista" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($b as $linha)
			{
?>
			<option value="<?=$linha['id_motorista']?>"><?=$linha['nome_motorista'];?></option>

<?php
			}
?> 
		</select>
	</div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Educadora</label>
		<select name="educadora" id="educadora" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($c as $linha)
			{
?>
			<option value="<?=$linha['id_educadora']?>"><?=$linha['nome_educadora'];?></option>

<?php
			}
?> 
		</select>
	</div>
	
	<div class="row" align="center">
		<div class="form-group col-md-6" >
			<img class="img-rounded" name="alunoFoto" id="dvPreview" src="../assets/images/usuarios/avatarHomem.jpg" width="75" height="75">
				 <div class="form-file">
					<input type="file" name="foto" value="" id="foto">
					<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>
				</div>
		</div>
	</div>
	
 </div>
</form>