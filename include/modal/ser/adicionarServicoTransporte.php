<?php 
	require_once '../../../Connections/connection.php';
	

	$sql1="SELECT * FROM `tblaluno`";
	$a=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblzona`";
	$b=mysqli_query($con, $sql3);
	
	$sql1="SELECT * FROM `tblpercurso`";
	$c=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblcarinha`";
	$d=mysqli_query($con, $sql3);
	
	$sql3="SELECT * FROM `tbleducadora`";
	$e=mysqli_query($con, $sql3);
	
?>


<form id="formulario" action ="../display/rg_servicotransporte.php"  method="post">
	
<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Aluno</label>
		<select name="aluno" id="aluno" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($a as $linha)
			{
?>
			<option value="<?=$linha['id_aluno']?>"><?=$linha['nome_aluno'];?></option>

<?php
			}
?> 
		</select>
		 
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Zona</label>
		<select name="zona" id="zona" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($b as $linha)
			{
?>
			<option value="<?=$linha['id_zona']?>"><?=$linha['nome_zona'];?></option>

<?php
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Percurso</label>
		<select name="percurso" id="percurso" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($c as $linha)
			{
?>
			<option value="<?=$linha['id_percurso']?>"><?=$linha['nome_percurso'];?></option>

<?php
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Carrinha</label>
		<select name="carrinha" id="carrinha" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($d as $linha)
			{
?>
			<option value="<?=$linha['id_carrinha']?>"><?=$linha['matricula'];?></option>

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
			foreach ($e as $linha)
			{
?>
			<option value="<?=$linha['id_educadora']?>"><?=$linha['nome_educadora'];?></option>

<?php
			}
?> 
		</select>
</div>

 </div>
</form>