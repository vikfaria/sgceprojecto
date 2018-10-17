<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");
$sql="SELECT * FROM `tblaluno`";
$stmt=mysqli_query($con, $sql);

$sql1="SELECT * FROM `tblencarregado`";
$a=mysqli_query($con, $sql1);

$sql2="SELECT * FROM `tblescola`";
$b=mysqli_query($con, $sql2);

$sql3="SELECT * FROM `tblzona`";
$c=mysqli_query($con, $sql3);

$aux = new classes();

?>

<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="b1" data-toggle="modal" data-target="#newAluno" ><i class="glyphicon glyphicon-plus"></i> Adicionar Aluno</button>
</div>
<br>


<!-- .modal Inserção Aluno-->
<div id="newAluno" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Adicionar Alunos</h5>
      </div>
      <div class="modal-body text-center p-sm">
		<div class="modal-animation"></div>
        
<form id="form" action ="../display/rg_aluno.php" method="POST">
	<div class="row">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" id="nome"required value="">
		<label style="padding-left:10px">Nome Filho</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido" id="apelido" required value="">
		<label style="padding-left:10px">Apelido</label>
	  </div>
	<!--row-->
	</div>
	
<div class="row">	
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
	
<div class="form-group col-md-6" >
		<label for="datafim"> Data Nascimento</label>
		<input type="text" id="data" name="data" value="" class="form-control" ui-jp="datetimepicker" ui-options="{
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
</div>

<div class="row">
<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Escola</label>
		<select name="escola" id="escola" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
		  <option value="1"></option>
<?php
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
                  <option value=""></option>
<?php
                foreach ($a as $linha)
                {
?>
                <option value="<?=$linha['id_encarregado']?>"><?=$linha['nome_encarregado'];?></option>

<?php
                }
?> 
		</select>
</div>
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


</div>
 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-sm" data-dismiss="modal">Cancelar</button> 
        <button type="submit" name = "submit" id = "submit"  data-toggle="modal" class="btn danger p-x-sm blue-900">Confirmar</button>
</div>
</form>
 
		
      </div>
    </div><!-- /.modal-content -->
  </div>

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr>
		
        <th  data-toggle>Foto</th>
		<th>Nome Aluno</th>
        <th >Apelido</th>
		<th >Data Nascimento</th>
		<th>Encarregado</th>
		<th >Morada</th>
		<th >Escola</th>
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	$id_aluno = $linha1['id_aluno'];
	$nome_aluno = $linha1['nome_aluno'];	
    $apelido_aluno = $linha1['apelido_aluno'];
    $id_zona = $linha1['id_zona'];
	$foto = $linha1['foto'];
	$data_nascimento = $linha1['data_nascimento'];
    $id_encarregado = $linha1['id_encarregado'];
	$id_escola = $linha1['id_escola'];
	$encarregado = $aux->getRow("tblencarregado", "nome_encarregado", "id_encarregado", $id_encarregado);
	$morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$escola = $aux->getRow("tblescola", "nome_escola", "id_escola", $id_escola);

?>
<!-- .modal Actualizar Aluno-->
<div id="upAluno" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Actualizar Dados do Aluno</h5>
      </div>
       <div class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
        <div class="modal-data" ></div>
      </div>

      </div>
    </div><!-- /.modal-content -->
  </div>
</div>	
<!-- / .modal -->


  <tr>
    <td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."></span></td>
	<td ><?=$nome_aluno?></td>
	<td ><?=$apelido_aluno?></td> 
	<td ><?=$data_nascimento?></td> 
	<td ><?=$encarregado?></td>
	<td ><?=$morada?></td>
	<td ><?=$escola?></td>
   
   

      
<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm editarUsu update" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_aluno."&".$nome_aluno."&".$apelido_aluno."&".$id_zona."&".$foto."&".$data_nascimento."&".$id_encarregado."&".$id_escola?>" > <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_aluno.php?id=<?=$linha1['id_aluno']?>"><button class="btn btn-sm red-700 reset"  style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser" ></i></button></a> 

		</div>
	</td>
 </tr>
<?php
     }
?>
</tbody>
<tfoot class="hide-if-no-paging">
  <tr>
	  <td colspan="5" class="text-center">
		  <ul class="pagination"></ul>
	  </td>
  </tr>
</tfoot>
</table>

