<?php 
	require_once '../Connections/connection.php';
	

	$sql3="SELECT * FROM `tblescola`, `tblzona` WHERE `tblescola`.`id_zona` like `tblzona`.`id_zona`";
	$c=mysqli_query($con, $sql3);
	
	$id_escola = $_POST['id_escola'];
	$nome_escola = $_POST['nome_escola'];  
    $contacto_escola = $_POST['contacto_escola'];
    $id_zona = $_POST['id_zona'];
?>


<form id="form" action ="../display/rg_actualizarEscola.php" method="post">
<br>
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome" required value="<?php echo (isset($nome_escola)) ? $nome_escola: ''?>">
		<input type="hidden" class="md-input" name="escola" id="escola"  value="<?=$_POST['id_escola']?>">
		<label style="padding-left:10px">Nome Escola</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" id="cell" required value="<?php echo (isset($contacto_escola)) ? $contacto_escola: ''?>">
		<label style="padding-left:10px">Contato</label>
	  </div>
	<!--row-->

	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($c as $linha)
			{
			  $id_escola = $linha['id_escola'];	
			  $nome_zona = $linha['nome_zona'];
              echo "<option value='$id_escola'>$nome_zona</option>";
			  
			}
?> 
		</select>
	</div>
	<br>
	<div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subEscola" id = "subEscola"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
</div>
 </div>
</form>