
<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");

$sql="SELECT * FROM `tblencarregado`";
$stmt=mysqli_query($con, $sql);

$sql="SELECT * FROM `tblzona`";
$stm=mysqli_query($con, $sql);

$aux = new classes();
?>

<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="btEncarregado"  ><i class="glyphicon glyphicon-plus"></i> Adicionar Encarregado</button>
</div>
<br>


<!-- .modal -->
<div id="novoPai" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Cadastro do Encarregado</h5>
      </div>
      <div class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
<form id="form" action ="../display/rg_encarregado.php" method="post">
	   	<div class="row"  align="left">
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome" required value="">
		<label style="padding-left:10px">Nome Encarregado</label>
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
			foreach ($stm as $linha)
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
      <button type="submit" name = "submeti" id = "submeti" data-toggle="modal" class="btn danger p-x-sm blue-900">Confirmar</button>
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
        <th >Foto</th>
		<th >Nome Pai</th>
        <th >Apelido</th>
		<th data-hide="phone,tablet">Cell</th>
		<th data-hide="phone,tablet">Email</th>
		<th >Morada</th>
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha = mysqli_fetch_assoc($stmt))
     {   
         $id_encarregado = $linha['id_encarregado'];
		 $nome_encarregado = $linha['nome_encarregado'];
		 $apelido_encarregado = $linha['apelido_encarregado'];
		 $contacto_encarregado = $linha['contacto_encarregado'];
		 $email_encarregado = $linha['email_encarregado'];
		 $id_zona = $linha['id_zona'];
		 $foto = $linha['foto'];
	     $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
         

	
?>

<!-- .modal Actualizar Carrinhas-->
<div id="upEncarregado" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Actualizar Dados do Encarregado</h5>
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
	<td ><?=$nome_encarregado?></td>
	<td ><?=$apelido_encarregado?></td>
	<td ><?=$contacto_encarregado?></td>  
	<td ><?=$email_encarregado?></td> 
	<td ><?=$morada?></td>
	
	</div>
	
<td align="center">
	   <div class =" btn-group">
			<a style="color:black" ><button class="btn btn-sm editarUsu updatencarregado" type ="submit" style="width: 40px;"  title="Editar" id="upA" name="upA"  value ="<?=$id_encarregado."&".$nome_encarregado."&".$apelido_encarregado."&".$contacto_encarregado."&".$email_encarregado."&".$id_zona."&".$foto?>"> <i class="fa fa-edit"></i></button>
	        <a style="color:white" ><a href ="../code/del_encarregado.php?id=<?=$id_encarregado?>"><button class="btn btn-sm red-700 reset" style="width: 40px;"  title="Eliminar" ><i class="fa fa-eraser"></i></button></a> 
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
