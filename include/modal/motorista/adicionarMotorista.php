<?php 
	require_once '../../../Connections/connection.php';
	

	$sql1="SELECT * FROM `tblmotorista`";
	$a=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblzona`";
	$c=mysqli_query($con, $sql3);
?>


<form id="form" action ="../display/rg_motoristas.php" method="post">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" required value="">
		<label style="padding-left:10px">Nome Motorista</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" required value="">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	<!--row-->
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" required value="">
		<label style="padding-left:10px">Cell</label>
	  </div>
	  
	   <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="email" required value="">
		<label style="padding-left:10px">Email</label>
	  </div>
	
	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
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
			<img class="img-rounded" name="alunoFoto" id="dvPreview" src="../assets/images/usuarios/avatarHomem.jpg" width="75" height="75">
				 <div class="form-file">
					<input type="file" name="foto" value="" id="foto">
					<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>
				</div>
		</div>
	</div>
 </div>
</form>