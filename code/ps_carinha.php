
<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");


   $sql1="SELECT * FROM `tblcarinha`";
    $stmt=mysqli_query($con, $sql1);

  

$sql2="SELECT * FROM `tbltipocarinha`";
$a=mysqli_query($con, $sql2);

$sql3="SELECT * FROM `tblmotorista`";
$b=mysqli_query($con, $sql3);

$sql4="SELECT * FROM `tbleducadora`";
$c=mysqli_query($con, $sql4);

$aux = new classes();
$foto ="";
$tipo_cari ="";
$lot = "";
$matri ="";
$cont = "";
$moto = "";
$educa = "";

?>

	
	<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="btn3"  data-toggle="modal" data-target="#novoCarrinha" ><i class="glyphicon glyphicon-plus"></i> Adicionar Carrinha</button>
</div>
<br>

<br>
</br>


<div id="dataModal" class="modal fade" data-backdrop = "false">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
					 <br>
					 <br>
                     <h4 class="modal-title">Detalhes da Carrinha do Seu Filho</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-blue-900" data-dismiss="modal">Fechar</button>  
                </div>  
           </div>  
      </div>  
 </div>  

<!-- .modal -->
<div id="novoCarrinha" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Cadastro de Carrinha</h5>
      </div>
      <div class="modal-body text-center p-lg">
		
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
			<option value="<?=$linha['id_tipo_carinha']?>"><?=$linha['nome_tipo_carinha'];?></option>

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
        <button type="submit" name = "sub" id = "sub" data-toggle="modal" class="btn danger p-x-sm blue-900">Confirmar</button>
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
        <th  data-toggle>Foto</th>
		<th >Modelo</th>
		<th >Lotação</th>
		<th >Matricula</th>
		<th>Contacto</th>
		<th>Motorista</th>
		<th>Educadora</th>
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
	  
	  
      </thead>
      <tbody class="tableBody" >
<?php
 foreach($stmt as $linha)
   {
	$id_carrinha = $linha['id_carrinha'];	 
    $matricula = $linha['matricula'];
    $lotacao = $linha['lotacao'];
    $id_tipo_carinha = $linha['id_tipo_carinha'];
    $contacto = $linha['contacto'];
    $id_motorista = $linha['id_motorista'];
    $id_educadora = $linha['id_educadora'];
    $foto = $linha['foto'];
	$tipo_carinha = $aux->getRow("tbltipocarinha", "nome_tipo_carinha", "id_tipo_carinha", $id_tipo_carinha);
	$motorista = $aux->getRow("tblmotorista", "nome_motorista", "id_motorista", $id_motorista);
	$educadora = $aux->getRow("tbleducadora", "nome_educadora", "id_educadora", $id_educadora);
	

?>

<!-- .modal Actualizar Carrinhas-->
<div id="upCarrinha" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Actualizar Dados da Carrinha</h5>
      </div>
       <div  class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
        <div class="modal-data"></div>
      </div>

      </div>
    </div><!-- /.modal-content -->
  </div>
</div>	

  <tr>
   
    
	<td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."><i class="<?=$estado?> b-white bottom"></i></span></td>
	
	<td ><?=$tipo_carinha?></td>
	<td ><?=$lotacao?></td>
	<td ><?=$matricula?></td> 
	<td ><?=$contacto?></td> 
	<td ><?=$motorista?></td>
    <td ><?=$educadora?></td>
   	


<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm editarUsu updateCarrinha" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_carrinha."&".$id_tipo_carinha."&".$lotacao."&".$matricula."&".$contacto."&".$id_motorista."&".$id_educadora."&".$foto?>" > <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_carinha.php?id=<?=$id_carrinha?>"><button class="btn btn-sm red-700 reset" style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser"></i></button></a> 
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