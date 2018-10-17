
<?php 
$sql="SELECT * FROM `tblaluno`";
$stmt=mysqli_query($con, $sql);


$sql1="SELECT * FROM `tblencarregado`";
$a=mysqli_query($con, $sql1);

$sql2="SELECT * FROM `tblescola`";
$b=mysqli_query($con, $sql2);

$sql3="SELECT * FROM `tblzona`";
$c=mysqli_query($con, $sql3);

?>

<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="btn1"><i class="glyphicon glyphicon-plus"></i> Adicionar Aluno</button>
</div>
<br>


<!-- .modal -->
<div id="novoAluno" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Cadastro do Aluno</h5>
      </div>
      <div class="modal-body text-center p-lg">
		<div class="modal-animation"></div>
        <div class="modal-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" name = "submit" form="form" class="btn danger p-x-sm blue-900">Registar</button>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- / .modal -->

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
  

		

		<th>Nome Aluno</th>
        <th >Apelido</th>
		<th >Data Nascimento</th>
		<th>Encarregado</th>
		<th >Morada</th>
		<th >Escola</th>
		<th  data-toggle>Foto</th>
		
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	
	$nome_aluno = $linha1['nome_aluno'];	
    $apelido_aluno = $linha1['apelido_aluno'];
    $id_zona = $linha1['id_zona'];
	$foto = $linha1['foto'];
	$data_nascimento = $linha1['data_nascimento'];
    $id_encarregado = $linha1['id_encarregado'];
	$id_escola = $linha1['id_escola'];
	
		/* 
		 //Verificacao da palavra pass
		 if($pass == md5("1230"))
			 $estadPass = "disabled";
		 //Sexo
		 if($sexo == "M")
			 $checkedSM = "checked";
		 else
			 $checkedSF = "checked";
		 //Nivel de Acesso
		 if($nivel == 0)
			 $nivel = "Administrador";
		 else if($nivel == 1)
		 {
			 $nivel = "Operador";
			 $checkedO = "checked";
		 }
		 else if($nivel == 2)
		 {
			 $nivel = "Usuario Normal";
			 $checkedU = "checked";
		 }
		 if($estado == 1)
			 $estado = 'on';
		 else
			 $estado = 'busy';
		 */
?>
  <tr>
	<td ><?=$nome_aluno?></td>
	<td ><?=$apelido_aluno?></td> 
	<td ><?=$data_nascimento?></td> 
	<td ><?=getRow("tblencarregado", "nome_encarregado", "id_encarregado", $id_encarregado)?></td>
    <td ><?=getRow("tblzona", "nome_zona", "id_zona", $id_zona)?></td>
    <td ><?=getRow("tblescola", "nome_escola", "id_escola", $id_escola)?></td>	
    <td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."></span></td>

	
	
<td style="text-align: center; width: 150px">
    <a style="color:black" <a href="../code/del_filho.php?id=<?=$linha1['nome_aluno']?>"<button class="btn btn-sm editarUsu" style="width: 40px;"  title="Editar"><i class="fa fa-edit"></i></button>
	<a style="color:white" <a href="../code/del_filho.php?id=<?=$linha1['nome_aluno']?>"<button class="btn btn-sm red-700 reset" style="width: 40px;"  title="Eliminar"><i class="fa fa-eraser"></i></button>
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