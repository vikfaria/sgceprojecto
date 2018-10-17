<?php 
	require_once '../Connections/connection.php';
	
	include ("../Classes/classes.php");
    $aux = new classes();
	
	 $id_alu = $_POST['id_aluno']; 
     $escola = $_POST['escola'];  
     $nome = $_POST['nome'];
     $apelido = $_POST['apelido'];
     $zona = $_POST['zona'];
     $foto = $_POST['foto'];
	 $data = $_POST['data'];
     $encarregado = $_POST['encarregado'];
	 $escola = $_POST['escola'];


	$sql3="SELECT * FROM  `tblzona`";
	$a=mysqli_query($con, $sql3);
	
	$sql2="SELECT * FROM  `tblescola` ";
	$b=mysqli_query($con, $sql2);
	
	$sql1="SELECT * FROM  `tblencarregado`";
	$c=mysqli_query($con, $sql1);
	
	
	$zon =  $aux->getRow("tblzona", "nome_zona", "id_zona", $zona);
	$enc =  $aux->getRow("tblencarregado", "nome_encarregado", "id_encarregado", $encarregado);
	$esc =  $aux->getRow("tblescola", "nome_escola", "id_escola", $escola);

?>

<form id="entra" action ="../display/rg_actualizarAluno.php"   method="post">

	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome" required value="<?php echo (isset($nome)) ? $nome: ''?>">
		<input type="hidden" class="md-input" name="aluno" id="aluno"  value="<?=$_POST['id_aluno']?>">
		<label style="padding-left:10px">Nome Filho</label>
	  </div>
	  
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" id="apelido" required value="<?php echo (isset($apelido)) ? $apelido: ''?>">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	  

	
<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
	
		<select name="morada" id="morada" class="form-control select2" " ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			
<?php
            echo "<option>$zon</option>";
			foreach ($a as $linha)
			{
?>
			<option value="<?=$linha['id_zona']?>"><?=$linha['nome_zona'];?></option>
			 

<?php
			}
?>   
	<input type="hidden" value="<?=$linha['id_zona']?>" name="idFuncionario">
            </select>
</div>
	
<div class="form-group col-md-6" >
		<label for="datafim"> Data Nascimento</label>
		<input type="text" id="data" name="data" value="<?php echo (isset($data)) ? $data: ''?>" class="form-control" ui-jp="datetimepicker" ui-options="{
				format: 'YYYY-MM-DD',
				icons: {
				  time: 'fa fa-clock-o',
				  date: 'fa fa-calendar',
				  up: 'fa fa-chevron-up',
				  down: 'fa fa-chevron-down',
				  previous: 'fa fa-chevron-left',
				  next: 'fa fa-chevron-right',
				  today: 'fa fa-screenshot',
				  clear: 'fa fa-trash',
				  close: 'fa fa-remove'
				}
			  }" required />
</div>
<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Escola</label>
		<select name="escola" id="escola" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
		 
<?php
            echo "<option>$esc</option>";
			foreach ($b as $linha)
			{
?>
			<option value="<?=$linha['id_escola']?>"><?=$linha['nome_escola'];?></option>
			 

<?php
			}
?> 
		</select>
</div>



<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Encarregado</label>
	    <select name="encarregado" id="encarregado" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
                
<?php
            echo "<option>$enc</option>";
			foreach ($c as $linha)
			{
?>
			<option value="<?=$linha['id_encarregado']?>"><?=$linha['nome_encarregado'];?></option>
			 

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
		<button type="submit" name = "sub" id = "sub"   class="btn danger p-x-md blue-900">Confirmar</button>
</div>
</div>
</form>