
<?php 
require_once ('../Connections/connection.php');
include ("../Classes/classes.php");

$aux = new classes();

$data = date('Y-m-d');

// perguntar a andre uma forma de passar os valores de encarregado, aluno estado real.

$sql="SELECT * FROM `tblpresenca`,`tblaluno`,`tblencarregado`,`tblusuario` WHERE `tblpresenca`.`id_aluno` LIKE `tblaluno`.`id_aluno` AND `tblaluno`.`id_encarregado` LIKE `tblencarregado`.`id_encarregado` AND `tblencarregado`.`usuarioId` LIKE `tblusuario`.`usuarioId` AND `data_presenca`= '$data'";
	   
$stmt = mysqli_query($con, $sql);

//$veri = verificaLocalizacao( $aluno, $estado, $tipopresenca);

?>
<br>
<br>

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
  

		
        <th  data-toggle>Foto</th>
		<th>Nome Filho</th>
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
  <tr>
     <td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$foto?>" alt="..."></span></td>
	<td ><?=$nome_aluno?></td>
	<td ><?=$apelido_aluno?></td> 
	<td ><?=$data_nascimento?></td> 
	<td ><?=$encarregado?></td>
    <td ><?=$morada?></td>
    <td ><?=$escola?></td>	
   

	
	
<td style="text-align: center; width: 150px">
   <a href ="../localizacao/googlemap.php"><button class="btn btn-info btn-xs view_motorista" >Localizar</button>
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