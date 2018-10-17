<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");
$sql="SELECT * FROM `tblrotas`";
$stmt=mysqli_query($con, $sql);

$sql1="SELECT * FROM `tblcarinha`";
$a=mysqli_query($con, $sql1);

$aux = new classes();

?>


<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="b1" data-toggle="modal" data-target="#newRota" ><i class="glyphicon glyphicon-plus"></i> Adicionar Rota</button>
</div>

<br>
</br>

<!-- .modal Inserção Aluno-->
<div id="newRota" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Adicionar Nova Rota</h5>
      </div>
      <div class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
        
<form id="form" action ="../display/rg_rotas.php" method="POST">
	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nomeRota" id="nomeRota"required value="">
		<label style="padding-left:10px">Nome Rota</label>
	  </div>
	  
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="origemRota" id="origemRota" required value="">
		<label style="padding-left:10px">Origem Rota</label>
	  </div>
	
	 <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="destinoRota" id="destinoRota" required value="">
		<label style="padding-left:10px">Destino Rota</label>
	  </div>
	
	<div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="localizacaoRota" id="localizacaoRota" required value="">
		<label style="padding-left:10px">Localizacao</label>
	  </div>


<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Carrinha</label>
	    <select name="carrinhaRota" id="carrinhaRota" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
                  <option value=""></option>
<?php
                foreach ($a as $linha)
                {
?>
                <option value="<?=$linha['id_carrinha']?>"><?=$linha['matricula'];?></option>

<?php
                }
?> 
		</select>
</div>
		


</div>
 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-sm" data-dismiss="modal">Cancelar</button> 
        <button type="submit" name = "submit" id = "submit"  data-toggle="modal" class="btn danger p-x-sm  blue-900">Confirmar</button>
</div>
</form>
 
		
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>	
<!-- / .modal -->





<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
  

		
      
		<th>Nome Rota</th>
        <th >Origem</th>
		<th >Destino</th>
		<th>Localizacao</th>
		<th >Carrinha</th>
	
		
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	$id_rota = $linha1['id_rota'];
	$nome_rota = $linha1['nome_rota'];
    $origem_rota = $linha1['origem_rota'];
    $destino_rota = $linha1['destino_rota'];
    $localizacao = $linha1['localizacao'];
	$id_carrinha = $linha1['id_carrinha'];	
	$carrinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
	

?>
<!-- .modal Actualizar Aluno-->
<div id="upRotas" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Actualizar Dados da Rota</h5>
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
   
	<td ><?=$nome_rota?></td>
	<td ><?=$origem_rota?></td> 
	<td ><?=$destino_rota?></td> 
	<td ><?=$localizacao?></td>
	<td ><?=$carrinha?></td>
   
  

      
<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm editarUsu updateRotas" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_rota."&".$nome_rota."&".$origem_rota."&".$destino_rota."&".$localizacao."&".$id_carrinha?>" > <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_rotas.php?id=<?=$linha1['id_rota']?>"><button class="btn btn-sm red-700 reset"  style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser" ></i></button></a> 

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

