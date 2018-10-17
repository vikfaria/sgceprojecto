
<?php 
@require_once '../Connections/connection.php';
include ("../Classes/classes.php");

$sql="SELECT * FROM `tbladerencia`, `tblaluno` where `tbladerencia`.`id_aluno` like `tblaluno`.`id_aluno`";
$stmt=mysqli_query($con, $sql);


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
	
	$sql4="SELECT * FROM `tblmotorista`";
	$g=mysqli_query($con, $sql4);
	
	$sql5="SELECT * FROM `tblrotas`";
	$y=mysqli_query($con, $sql5);

	
	
	
	$aux = new classes();
?>

<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="bt" data-toggle="modal" data-target="#novoS"><i class="glyphicon glyphicon-plus"></i>Adicionar Serviço</button>
</div>
<br>

<!-- .modal -->
<div id="novoS" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Cadastro de Serviços de Transporte</h5>
      </div>
	  <br>
      <div class="modal-body text-center p-lg">
        <div class="modal-animation"></div>
		
<form id="formulario" action ="../display/rg_servicotransporte.php"  method="post">
<div class="row"  align="left">	
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

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Motorista</label>
		<select name="motorista" id="motorista" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($g as $linha)
			{
?>
			<option value="<?=$linha['id_motorista']?>"><?=$linha['nome_motorista'];?></option>

<?php
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Rota</label>
		<select name="rota" id="rota" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  <option value=""></option>
<?php
			foreach ($y as $linha)
			{
?>
			<option value="<?=$linha['id_rota']?>"><?=$linha['nome_rota'];?></option>

<?php
			}
?> 
		</select>
</div>


 </div>
  
 </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
        <button type="submit" name = "submit" id="submit"form="formulario" class="btn danger p-x-md">Registar</button>
      </div>
 
</form>
</div>		
 
    </div><!-- /.modal-content -->
  </div>

<!-- / .modal -->

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
	    <th>Foto</th>
		<th>Aluno</th>
        <th >Zona</th>
		<th >Percurso</th>
		<th>Carrinha</th>
		<th >Educadora</th>
		<th >Motorista</th>
		<th >Rota</th>

		
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	$foto = $linha1['foto'];
	$id_aderencia = $linha1['id_aderencia'];
	$id_aluno = $linha1['id_aluno'];	
    $id_zona = $linha1['id_zona'];
    $id_percurso = $linha1['id_percurso'];
	$id_carrinha = $linha1['id_carrinha'];
	$id_educadora = $linha1['id_educadora'];
	$id_motorista = $linha1['id_motorista'];
	$id_rota = $linha1['id_rota'];
	$aluno = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);
	$zona = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$educadora = $aux->getRow("tbleducadora", "nome_educadora", "id_educadora", $id_educadora);
	$percurso = $aux->getRow("tblpercurso", "nome_percurso", "id_percurso", $id_percurso);
	$carinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
	$motorista = $aux->getRow("tblmotorista", "nome_motorista", "id_motorista", $id_motorista);
	$rota = $aux->getRow("tblrotas", "nome_rota", "id_rota", $id_rota);
	
	
?>



<!-- .modal Actualizar Serviços de transportes-->
	<div id="upservicotrans" class="modal fade animate" data-backdrop="false">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
		  <br>
	      <br>
			<h5 class="modal-title">Actualizar Serviços de Transporte</h5>
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
  
     <td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."><i class="<?=$estado?> b-white bottom"></i></span></td>  
	<td ><?=$aluno?></td>
    <td ><?=$zona?></td>
    <td ><?=$percurso?></td>	
	<td ><?=$carinha?></td>
    <td ><?=$educadora?></td>
    <td ><?=$motorista?></td>
    <td ><?=$rota?></td>	

	
	
<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm btnclas" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_aderencia."&".$id_aluno."&".$id_zona."&".$id_percurso."&".$id_carrinha."&".$id_educadora?>"> <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_servTransporte.php?id=<?=$id_aderencia?>"><button class="btn btn-sm red-700 reset" style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser"></i></button></a> 
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