<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
require_once ('../Connections/connection.php');
require_once ('../get/variaveis.php');

include ("../Classes/classes.php");
$aux = new classes();

$horas = date('H');

$sql = "SELECT * FROM `tbladerencia`, `tblaluno`
WHERE `tbladerencia`.`id_aluno` LIKE `tblaluno`.`id_aluno`";

$stmt=mysqli_query($con, $sql);



$estado = '';
$id_tpresenca = '';


if($horas < 12){
$estado = 1;
$id_tpresenca = 1;
}
if($horas > 12){
 $estado = 2;
$id_tpresenca = 2;
}


 $a =  $aux->getRow("tbltpresenca", "nome_tpresenca", "id_tpresenca", $id_tpresenca);  
 $b =  $aux->getRow("tblestado", "nome_estado", "id_estado", $estado);  


?>

<div class="box-body b-b b-t row" >
     <ol class="breadcrumb col-md-9 col-xs-9 col-sm-9"  >
	 
        <li class="breadcrumb-item" ><?=$a?></a></li>
        <li class="breadcrumb-item active"  ><?=$b?></li>
		

</ol>
<div class ="col-md-2 col-xs-2 col-sm-2 pull-right">
<a href ="../display/index.php"><button class="btn btn-outline b-success text-success">Terminar</button></a>
</div>
</div>

 
			

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
        <th>Foto</th>
		<th>Aluno</th>
        <th >Zona</th>
		<th >Percurso</th>
		<th>Carrinha</th>
		<td class = "_600 text-center" > Acção Marcar Presença</td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	$id_aderencia = $linha1['id_aderencia'];
	$foto = $linha1['foto'];
	$id_aluno = $linha1['id_aluno'];	
    $id_zona = $linha1['id_zona'];
    $id_percurso = $linha1['id_percurso'];
	$id_carrinha = $linha1['id_carrinha'];
    $id_estado = $estado;
	$id_tipo_presenca = $id_tpresenca;
	$aluno = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);
    $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$percurso = $aux->getRow("tblpercurso", "nome_percurso", "id_percurso", $id_percurso);
    $carinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
     
?>
  <tr>
   <td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."></span></td>
	<td ><?=$aluno?></td>
    <td ><?=$morada?></td>
    <td ><?=$percurso?></td>	
	<td ><?=$carinha?></td>
    
	
	<td align="center">
	   <div class =" btn-group">
			<button class="md-btn md-raised m-b-sm w-xs green tbp" id = "id" name ="btrP" value="<?=$linha1['id_aderencia']."&".$id_estado."&".$id_tipo_presenca?>">Presente</button>
			<button class="md-btn md-raised m-b-sm w-xs red tba" name ="ausente"  value="<?=$linha1['id_aderencia']."&".$id_estado."&".$id_tipo_presenca?>">Ausente</button>
			<button class="md-btn md-raised m-b-sm  blue cancelar" hidden style = "width:45px" name ="ausente"  value=""><i class = "fa fa-reply-all"></i></button>
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

<input type="hidden" value="" id="location"/>
<input type="hidden" value="" id="latitude"/>
<input type="hidden" value="" id="longitude"/>