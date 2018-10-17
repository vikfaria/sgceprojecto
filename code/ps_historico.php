<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");
$sql="SELECT * FROM `historico`";
$stmt=mysqli_query($con, $sql);

?>

<br>
<br>



<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr>
		
        <th  data-toggle>Tipo</th>
		<th>Usuario</th>
        <th >Data hora</th>
		<th >Descricao</th>
		<th>Tabela</th>
		<th >Registo Alterado</th>
		
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($stmt))
     {
	$id = $linha1['id'];
	$tipo = $linha1['tipo'];	
    $usuario = $linha1['usuario'];
    $data_hora = $linha1['data_hora'];
	$descricao = $linha1['descricao'];
	$tabela = $linha1['tabela'];
    $registoalterado = $linha1['registoalterado'];
	
	//$encarregado = $aux->getRow("historico", "nome_encarregado", "id_encarregado", $id_encarregado);
	//$morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	//$escola = $aux->getRow("tblescola", "nome_escola", "id_escola", $id_escola);

?>


  <tr>
   
	<td ><?=$tipo?></td>
	<td ><?=$usuario?></td> 
	<td ><?=$data_hora?></td> 
	<td ><?=$descricao?></td>
	<td ><?=$tabela?></td>
	<td ><?=$registoalterado?></td>
   
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

