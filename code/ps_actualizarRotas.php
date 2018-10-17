<?php 
	require_once '../Connections/connection.php';
	
$sql="SELECT * FROM `tblrotas`,`tblcarinha` WHERE `tblrotas`.`id_carrinha` like `tblcarinha`.`id_carrinha`";
$stmt=mysqli_query($con, $sql);


	
	 $id_rota = $_POST['id_rota']; 
	 $nome_rota = $_POST['nome_rota']; 
     $origem_rota = $_POST['origem_rota'];  
     $destino_rota = $_POST['destino_rota'];
     $localizacao = $_POST['localizacao'];
     $id_carrinha = $_POST['id_carrinha'];
     
	 

?>

<form id="entra" action ="../display/rg_actualizarRotas.php"   method="post">

	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nomeRota" id="nomeRota"required value="<?php echo (isset($nome_rota)) ? $nome_rota: ''?>">
		<input type="hidden" class="md-input" name="rota" id="rota"  value="<?=$_POST['id_rota']?>">
		<label style="padding-left:10px">Nome Rota</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="origem" id="origem" required value="<?php echo (isset($origem_rota)) ? $origem_rota: ''?>">
		<label style="padding-left:10px">Origem Rota</label>
	  </div>
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="destino" id="destino" required value="<?php echo (isset($destino_rota)) ? $destino_rota: ''?>">
		<label style="padding-left:10px">Destino Rota</label>
	  </div>
	
	<div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="localizacao" id="localizacao" value="<?php echo (isset($localizacao)) ? $localizacao: ''?>">
		<label style="padding-left:10px">Localizacao</label>
	  </div>


<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Carrinha</label>
	    <select name="carrinha" id="carrinha" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
               
<?php
                foreach ($stmt as $linha)
			{
			  $id_rota = $linha['id_rota'];	
			  $matricula = $linha['matricula'];
              echo "<option value='$id_rota'>$matricula</option>";
			  
			}
?> 
		</select>
</div>
 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subrotas" id = "subrotas"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
</div>
</form>