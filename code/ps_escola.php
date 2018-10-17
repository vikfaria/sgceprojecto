
<?php 
include '../connections/Connection.php';
include ("../Classes/classes.php");

  
$sql="SELECT * FROM `tblescola`";
$stmt=mysqli_query($con, $sql);

$sql="SELECT * FROM `tblzona`";
$stm=mysqli_query($con, $sql);

    $nome_escola = '';
    $cellEscola = '';
    $id_zona = '';
	
$aux = new classes();
?>


<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="btn6"  data-toggle="modal" data-target="#novoEscola" ><i class="glyphicon glyphicon-plus"></i> Adicionar Escola</button>
</div>
<br>


<!-- .modal -->
<div id="novoEscola" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Cadastro de Escola</h5>
      </div>
      <div class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
      
	  <form id="form" action ="../display/rg_escolas.php" method="post">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" required value="">
		<label style="padding-left:10px">Nome Escola</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="cell" required value="">
		<label style="padding-left:10px">Contato</label>
	  </div>
	<!--row-->

	<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Morada</label>
		<select name="morada" id="morada" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($stm as $linha)
			{
?>
			<option value="<?=$linha['id_zona']?>"><?=$linha['nome_zona'];?></option>

<?php
			}
?> 
		</select>
	</div>
	
 </div>
 
    <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" name = "submit" id="submit" class="btn danger p-x-sm blue-900">Registar</button>
      </div>
 
</form>
	  
	  
      </div>
   
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- / .modal -->

<div class="">
<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
        
		<th >Nome Escola</th>   
		<th data-hide="phone,tablet">Cell</th>	
		<th >Morada</th>
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha = mysqli_fetch_assoc($stmt))
     {
	$id_escola = $linha['id_escola'];	 
    $nome_escola = $linha['nome_escola'];  
    $contacto_escola = $linha['contacto_escola'];
    $id_zona = $linha['id_zona'];
    $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
?>

<!-- .modal Actualizar Escola-->
	<div id="upescola" class="modal fade animate" data-backdrop="false">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
		  <br>
		  <br>
			<h5 class="modal-title">Actualizar Dados da Escola</h5>
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
	<td ><?=$nome_escola?></td>
	<td ><?=$contacto_escola?></td>  
	<td ><?=$morada?></td>
	</div>

	
	<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm editarUsu updatescola" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_escola."&".$nome_escola."&".$contacto_escola."&".$id_zona?>"> <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_escola.php?id=<?=$id_escola?>"><button class="btn btn-sm red-700 reset" style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser"></i></button> </a>
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